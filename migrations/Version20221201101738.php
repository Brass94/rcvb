<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201101738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent_categorie DROP FOREIGN KEY FK_24AAB70025F06C53');
        $this->addSql('ALTER TABLE adherent_categorie DROP FOREIGN KEY FK_24AAB700BCF5E72D');
        $this->addSql('DROP TABLE adherent_categorie');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent_categorie (adherent_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_24AAB70025F06C53 (adherent_id), INDEX IDX_24AAB700BCF5E72D (categorie_id), PRIMARY KEY(adherent_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE adherent_categorie ADD CONSTRAINT FK_24AAB70025F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherent_categorie ADD CONSTRAINT FK_24AAB700BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }
}
