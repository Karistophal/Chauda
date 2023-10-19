<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231017150000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, id_util_avis_id INT NOT NULL, titre_avis VARCHAR(255) NOT NULL, texte_avis VARCHAR(255) NOT NULL, note_avis FLOAT NOT NULL, date_avis DATE NOT NULL, INDEX IDX_8F91ABF035B77709 (id_util_avis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, id_util_contact_id INT NOT NULL, sujet_contact VARCHAR(255) NOT NULL, message_contact LONGTEXT NOT NULL, INDEX IDX_4C62E638B3C60DF7 (id_util_contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presentation (id INT AUTO_INCREMENT NOT NULL, texte_presentation LONGTEXT NULL, experience_text LONGTEXT NULL, skills_text LONGTEXT NULL, certifications_text LONGTEXT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT NOT NULL, lib_prestation VARCHAR(255) NOT NULL, desc_prestation LONGTEXT NOT NULL, prix_ht DOUBLE PRECISION NOT NULL, prix_ttc DOUBLE PRECISION NOT NULL, main_oeuvre INT NOT NULL, duree_prestation DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_util VARCHAR(255) NOT NULL, prenom_util VARCHAR(255) NOT NULL, email_util VARCHAR(255) NOT NULL, login_util VARCHAR(255) NOT NULL, mdp_util VARCHAR(255) NOT NULL, droit_util INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF035B77709 FOREIGN KEY (id_util_avis_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638B3C60DF7 FOREIGN KEY (id_util_contact_id) REFERENCES utilisateur (id)');
        $this->addSql('INSERT INTO presentation (texte_presentation, experience_text, skills_text, certifications_text) VALUES ("Chez Chauda, notre priorité est votre confort. Nous comprenons que la chaleur de votre maison ou de votre entreprise est essentielle, et c\'est pourquoi nous sommes là pour vous offrir des solutions de chauffage fiables et efficaces, adaptées à vos besoins spécifiques.", "Forts de 10 années d\'expérience dans l\'industrie du chauffage, nous avons acquis une expertise approfondie dans tous les aspects de ce domaine.", "Nos compétences couvrent un large éventail de services liés au chauffage (voir page prestation pour plus de détails).", "- QUALI’PAC pour les installations de pompe à chaleur et climatisation")');
        $this->addSql('INSERT INTO utilisateur (nom_util, prenom_util, email_util, login_util, mdp_util, droit_util) VALUES ("Administrateur", "Chauffagiste", "bob@chauda.com", "bob_admin", "$2y$13$VkhaC0n4sjrUL.31QPfBSuflkSEDr71BWmJgER3gXOjxikKD4.I.e", 1)');
        $this->addSql('INSERT INTO prestation (id, lib_prestation, desc_prestation, prix_ht, prix_ttc, main_oeuvre, duree_prestation, image) VALUES (1, "Installation de système de chauffage", "Installation de chaudières à gaz, à fioul, électriques, ou à énergies renouvelables (pompes à chaleur, panneaux solaires thermiques, etc).
        Installation de radiateurs, planchers chauffants, et autres émetteurs de chaleur.", 50, 55.75, 2, 3, "https://media.istockphoto.com/id/921342418/fr/photo/plombier-m%C3%A2le-fixation-thermostat.jpg?s=2048x2048&w=is&k=20&c=rbSdL4HPRmGvLgnI2b3V5sd2UCb-Yghb8DfsDTR2QsI=")');
        $this->addSql('INSERT INTO prestation (id, lib_prestation, desc_prestation, prix_ht, prix_ttc, main_oeuvre, duree_prestation, image) VALUES (2, "Entretien et maintenance", "Contrats d\'entretien périodique pour s\'assurer que le système de chauffage fonctionne de manière optimale, en incluant le nettoyage, la vérification des composants, le remplacement des filtres, etc.
        Réparation des pannes et des dysfonctionnements du système de chauffage, y compris le remplacement de pièces défectueuses.", 32, 36.5, 1, 2, "https://media.istockphoto.com/id/178425815/fr/photo/technicien-en-r%C3%A9paration-dun-chauffe-eau-chaude.jpg?s=2048x2048&w=is&k=20&c=ehJQlhnvDTh0vF0z6B86nMZGa8_9eOVEvoyeHyolyv4=")');
        $this->addSql('INSERT INTO prestation (id, lib_prestation, desc_prestation, prix_ht, prix_ttc, main_oeuvre, duree_prestation, image) VALUES (3, "Dépannage d\'urgence", "Intervention en cas de panne de chauffage, en particulier en hiver, pour rétablir rapidement le chauffage dans le logement.", 65.5, 68.2, 2, 2.5, "https://media.istockphoto.com/id/482115611/fr/photo/chaudi%C3%A8re-de-chauffage-maintenance-technicien.jpg?s=2048x2048&w=is&k=20&c=IwG6z90upx3gl2vcQaQMaEP9Qaa6vaCFF0zYxWUICeU=")');
        $this->addSql('INSERT INTO prestation (id, lib_prestation, desc_prestation, prix_ht, prix_ttc, main_oeuvre, duree_prestation, image) VALUES (4, "Conseils et évaluation", "Fourniture de conseils sur le choix du système de chauffage le plus adapté aux besoins d\'un client.", 45, 47.8, 1, 1.5, "https://media.istockphoto.com/id/1218720433/fr/photo/technicien-et-ing%C3%A9nieur-de-chauffage-discutant-avec-le-propri%C3%A9taire-de-maison.jpg?s=2048x2048&w=is&k=20&c=MpKdswDrkLx8KCAx_pQUz4nX-Wk1Z4hesAwy9745AmI=")');

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
        $this->addSql('DELETE FROM presentation WHERE texte_presentation = "presentation"');
        $this->addSql('DELETE FROM utilisateur WHERE email_util = "admin@email.com"');
        $this->addSql('DELETE FROM prestation WHERE id = 1 AND id = 2 AND id = 3 AND id = 4');

    }
}
