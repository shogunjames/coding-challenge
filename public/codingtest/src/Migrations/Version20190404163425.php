<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190404163425 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, blogid_id INT NOT NULL, chaptersorder INT DEFAULT NULL, chaptersheadline LONGTEXT DEFAULT NULL, chapterstext LONGTEXT NOT NULL, chaptersimage LONGTEXT DEFAULT NULL, chapterimageid INT DEFAULT NULL, chapterimageheight INT DEFAULT NULL, chapterimagewidth INT DEFAULT NULL, chapterimagetext LONGTEXT DEFAULT NULL, chapterimageurl LONGTEXT DEFAULT NULL, chapterimagesource LONGTEXT DEFAULT NULL, INDEX IDX_F87474F3C2B162DC (blogid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3C2B162DC FOREIGN KEY (blogid_id) REFERENCES blog (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE lesson');
    }
}
