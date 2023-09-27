<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class VersionYYYYMMDDHHMMSS extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Ajoutez les colonnes à la table presentation
        $this->addSql('ALTER TABLE presentation ADD experience_text LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE presentation ADD skills_text LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE presentation ADD certifications_text LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE presentation ADD texte_presentation LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // Supprimez les colonnes de la table presentation en cas de réversion
        $this->addSql('ALTER TABLE presentation DROP experience_text');
        $this->addSql('ALTER TABLE presentation DROP skills_text');
        $this->addSql('ALTER TABLE presentation DROP certifications_text');
        $this->addSql('ALTER TABLE presentation DROP texte_presentation');
    }
}
