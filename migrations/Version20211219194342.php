<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219194342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create tag';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<SQL
            CREATE TABLE tag (
                id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(255) NOT NULL, 
                UNIQUE INDEX tag_index (name), 
                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<SQL
            DROP TABLE tag
        SQL);
    }
}
