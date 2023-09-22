<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230922142512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, id_util_avis_id INT NOT NULL, titre_avis VARCHAR(255) NOT NULL, texte_avis VARCHAR(255) NOT NULL, note_avis INT NOT NULL, INDEX IDX_8F91ABF035B77709 (id_util_avis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, id_util_contact_id INT NOT NULL, sujet_contact VARCHAR(255) NOT NULL, message_contact LONGTEXT NOT NULL, INDEX IDX_4C62E638B3C60DF7 (id_util_contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presentation (id INT AUTO_INCREMENT NOT NULL, texte_presentation LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, lib_prestation VARCHAR(255) NOT NULL, desc_prestation LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_util VARCHAR(255) NOT NULL, prenom_util VARCHAR(255) NOT NULL, email_util VARCHAR(255) NOT NULL, login_util VARCHAR(255) NOT NULL, mdp_util VARCHAR(255) NOT NULL, droit_util INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF035B77709 FOREIGN KEY (id_util_avis_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638B3C60DF7 FOREIGN KEY (id_util_contact_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF035B77709');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638B3C60DF7');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE utilisateur');
    }
}
