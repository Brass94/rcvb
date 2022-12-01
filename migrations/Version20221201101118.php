<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201101118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent_categorie (adherent_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_24AAB70025F06C53 (adherent_id), INDEX IDX_24AAB700BCF5E72D (categorie_id), PRIMARY KEY(adherent_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_pole (categorie_id INT NOT NULL, pole_id INT NOT NULL, INDEX IDX_8A49C5B6BCF5E72D (categorie_id), INDEX IDX_8A49C5B6419C3385 (pole_id), PRIMARY KEY(categorie_id, pole_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_adherent (id INT AUTO_INCREMENT NOT NULL, adherents_id INT DEFAULT NULL, categories_id INT DEFAULT NULL, INDEX IDX_A854B10A15364D07 (adherents_id), INDEX IDX_A854B10AA21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainement_categorie (entrainement_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_AE7ABE3AA15E8FD (entrainement_id), INDEX IDX_AE7ABE3ABCF5E72D (categorie_id), PRIMARY KEY(entrainement_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainement_terrain (entrainement_id INT NOT NULL, terrain_id INT NOT NULL, INDEX IDX_5D1E4B82A15E8FD (entrainement_id), INDEX IDX_5D1E4B828A2D8B41 (terrain_id), PRIMARY KEY(entrainement_id, terrain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrainement_staff_personnel (entrainement_id INT NOT NULL, staff_personnel_id INT NOT NULL, INDEX IDX_35C280F1A15E8FD (entrainement_id), INDEX IDX_35C280F19984921D (staff_personnel_id), PRIMARY KEY(entrainement_id, staff_personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherent_categorie ADD CONSTRAINT FK_24AAB70025F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherent_categorie ADD CONSTRAINT FK_24AAB700BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_pole ADD CONSTRAINT FK_8A49C5B6BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_pole ADD CONSTRAINT FK_8A49C5B6419C3385 FOREIGN KEY (pole_id) REFERENCES pole (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_adherent ADD CONSTRAINT FK_A854B10A15364D07 FOREIGN KEY (adherents_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE categorie_adherent ADD CONSTRAINT FK_A854B10AA21214B7 FOREIGN KEY (categories_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE entrainement_categorie ADD CONSTRAINT FK_AE7ABE3AA15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_categorie ADD CONSTRAINT FK_AE7ABE3ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_terrain ADD CONSTRAINT FK_5D1E4B82A15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_terrain ADD CONSTRAINT FK_5D1E4B828A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_staff_personnel ADD CONSTRAINT FK_35C280F1A15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_staff_personnel ADD CONSTRAINT FK_35C280F19984921D FOREIGN KEY (staff_personnel_id) REFERENCES staff_personnel (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent_categorie DROP FOREIGN KEY FK_24AAB70025F06C53');
        $this->addSql('ALTER TABLE adherent_categorie DROP FOREIGN KEY FK_24AAB700BCF5E72D');
        $this->addSql('ALTER TABLE categorie_pole DROP FOREIGN KEY FK_8A49C5B6BCF5E72D');
        $this->addSql('ALTER TABLE categorie_pole DROP FOREIGN KEY FK_8A49C5B6419C3385');
        $this->addSql('ALTER TABLE categorie_adherent DROP FOREIGN KEY FK_A854B10A15364D07');
        $this->addSql('ALTER TABLE categorie_adherent DROP FOREIGN KEY FK_A854B10AA21214B7');
        $this->addSql('ALTER TABLE entrainement_categorie DROP FOREIGN KEY FK_AE7ABE3AA15E8FD');
        $this->addSql('ALTER TABLE entrainement_categorie DROP FOREIGN KEY FK_AE7ABE3ABCF5E72D');
        $this->addSql('ALTER TABLE entrainement_terrain DROP FOREIGN KEY FK_5D1E4B82A15E8FD');
        $this->addSql('ALTER TABLE entrainement_terrain DROP FOREIGN KEY FK_5D1E4B828A2D8B41');
        $this->addSql('ALTER TABLE entrainement_staff_personnel DROP FOREIGN KEY FK_35C280F1A15E8FD');
        $this->addSql('ALTER TABLE entrainement_staff_personnel DROP FOREIGN KEY FK_35C280F19984921D');
        $this->addSql('DROP TABLE adherent_categorie');
        $this->addSql('DROP TABLE categorie_pole');
        $this->addSql('DROP TABLE categorie_adherent');
        $this->addSql('DROP TABLE entrainement_categorie');
        $this->addSql('DROP TABLE entrainement_terrain');
        $this->addSql('DROP TABLE entrainement_staff_personnel');
    }
}
