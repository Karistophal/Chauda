<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927085517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE presentation CHANGE experience_text experience_text LONGTEXT DEFAULT NULL, CHANGE skills_text skills_text LONGTEXT DEFAULT NULL, CHANGE certifications_text certifications_text LONGTEXT DEFAULT NULL, CHANGE texte_presentation texte_presentation LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE presentation CHANGE texte_presentation texte_presentation LONGTEXT NOT NULL, CHANGE experience_text experience_text LONGTEXT NOT NULL, CHANGE skills_text skills_text LONGTEXT NOT NULL, CHANGE certifications_text certifications_text LONGTEXT NOT NULL');
    }
}
