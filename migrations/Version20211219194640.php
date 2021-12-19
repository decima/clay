<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219194640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'add tags in assets';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
            CREATE TABLE asset_tag (
                asset_id INT NOT NULL, 
                tag_id INT NOT NULL, 
                INDEX IDX_6983740F5DA1941 (asset_id), 
                INDEX IDX_6983740FBAD26311 (tag_id), 
                PRIMARY KEY(asset_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
            ALTER TABLE asset_tag 
                ADD CONSTRAINT FK_6983740F5DA1941 
                    FOREIGN KEY (asset_id) REFERENCES asset (id) ON DELETE CASCADE;
            ALTER TABLE asset_tag 
                ADD CONSTRAINT FK_6983740FBAD26311 
                    FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE;

        SQL
        );

    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<SQL
            DROP TABLE asset_tag
        SQL
        );
    }
}
