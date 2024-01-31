<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240131155735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projet_web_stack (projet_web_id INT NOT NULL, stack_id INT NOT NULL, INDEX IDX_AF459820DCB1F71B (projet_web_id), INDEX IDX_AF45982037C70060 (stack_id), PRIMARY KEY(projet_web_id, stack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projet_web_stack ADD CONSTRAINT FK_AF459820DCB1F71B FOREIGN KEY (projet_web_id) REFERENCES projet_web (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_web_stack ADD CONSTRAINT FK_AF45982037C70060 FOREIGN KEY (stack_id) REFERENCES stack (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `admin` CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet_web_stack DROP FOREIGN KEY FK_AF459820DCB1F71B');
        $this->addSql('ALTER TABLE projet_web_stack DROP FOREIGN KEY FK_AF45982037C70060');
        $this->addSql('DROP TABLE projet_web_stack');
        $this->addSql('ALTER TABLE `admin` CHANGE roles roles JSON NOT NULL');
    }
}
