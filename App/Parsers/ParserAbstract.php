<?php

declare(strict_types=1);

namespace App\Parsers;

use App\bin\EntityManagerFactory;
use App\Services\LoggerService;
use App\Helpers\ArrayFromJsonTrait;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\DomCrawler\Crawler;

abstract class ParserAbstract
{
    protected readonly EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::create();
    }

    use LoggerService;
    use ArrayFromJsonTrait;

    abstract public function getProductTitle(Crawler $crawler): string;

    abstract public function getProductDescription(Crawler $crawler): string;

    abstract public function getProductPrice(Crawler $crawler): int;

    abstract public function getProductImage(Crawler $crawler): string;

    public function getParserClassName() : string {
        return (new \ReflectionClass(get_called_class()))->getShortName();
    }

    public function formattingRelations($parserClassName)
    {
        // PARSER RELATIONS
        $selectColumns = ['category_id', 'category_url', 'product_url', 'parser_class'];

        $oldRelations = $this->db->select('relations', $selectColumns, ['status[=]' => 1, 'parser_class[=]' => $parserClassName]);

        $oldRelations = array_map('json_encode', $oldRelations);

        // REMOTE RELATIONS

        $newRelations = $this->db->select('new_relations', $selectColumns, []);

        $newRelations = array_map('json_encode', $newRelations);

        // ARRAY DIFFERENCE

        $insertRelations = $this->arrayFromJson(array_diff($newRelations, $oldRelations));

        $disableRelations = $this->arrayFromJson(array_diff($oldRelations, $newRelations));

        $this->disableRelations($disableRelations);

        $this->insertRelations($insertRelations);
    }

    private function disableRelations(array $disableRelations)
    {
        foreach ($disableRelations as $disableRelation) {
            $this->db->update('relations', ['status' => 0], ['product_url[=]' => $disableRelation['product_url']]);

            $this->getLogDisableRelation($disableRelation['product_url']);
        }
    }

    private function insertRelations(array $insertRelations)
    {
        foreach ($insertRelations as $insertRelation) {
            $insertRelation = array_merge($insertRelation, ['status' => 1]);

            $this->db->insert('relations', $insertRelation);

            $this->getLogAddRelation($insertRelation['product_url']);
        }
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function clearCategories(string $parserClassName)
    {
        $this->db->clear('categories', $parserClassName);
    }

    public function clearRelations(string $parserClassName)
    {
        $this->db->clear('relations', $parserClassName);
    }

    public function clearProducts(string $parserClassName)
    {
        $this->db->clear('products', $parserClassName);
    }

    public function clearAll(string $parserClassName)
    {
        $this->clearCategories($parserClassName);
        $this->clearRelations($parserClassName);
        $this->clearProducts($parserClassName);
    }

}