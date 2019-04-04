<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190403163808 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog ADD subtitle LONGTEXT DEFAULT NULL, ADD introduction VARCHAR(255) DEFAULT NULL, ADD introductiontext LONGTEXT DEFAULT NULL, ADD display_date LONGTEXT DEFAULT NULL, ADD authorid INT DEFAULT NULL, ADD authorfirstname VARCHAR(255) DEFAULT NULL, ADD authorlastname VARCHAR(255) DEFAULT NULL, ADD imageid INT DEFAULT NULL, ADD height INT DEFAULT NULL, ADD width INT DEFAULT NULL, ADD imagetext LONGTEXT DEFAULT NULL, ADD url LONGTEXT DEFAULT NULL, ADD source LONGTEXT NOT NULL, ADD chaptersorder INT DEFAULT NULL, ADD chaptersheadline LONGTEXT DEFAULT NULL, ADD chapterstext LONGTEXT DEFAULT NULL, ADD chaptersimage LONGTEXT DEFAULT NULL, ADD chapterimageid INT DEFAULT NULL, ADD chapterimageheight INT DEFAULT NULL, ADD chapterimagewidth INT DEFAULT NULL, ADD chapterimagetext LONGTEXT DEFAULT NULL, ADD chapterimageurl LONGTEXT DEFAULT NULL, ADD chapterimagesource LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog DROP subtitle, DROP introduction, DROP introductiontext, DROP display_date, DROP authorid, DROP authorfirstname, DROP authorlastname, DROP imageid, DROP height, DROP width, DROP imagetext, DROP url, DROP source, DROP chaptersorder, DROP chaptersheadline, DROP chapterstext, DROP chaptersimage, DROP chapterimageid, DROP chapterimageheight, DROP chapterimagewidth, DROP chapterimagetext, DROP chapterimageurl, DROP chapterimagesource');
    }
}
