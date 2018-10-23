<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181017090827 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE disponibilite (id_disp INT AUTO_INCREMENT NOT NULL, prop_id INT DEFAULT NULL, annonce_id VARCHAR(25) DEFAULT NULL, date_dispo_start DATETIME NOT NULL, date_dispo_end DATETIME NOT NULL, INDEX IDX_2CBACE2FDEB3FFBD (prop_id), INDEX IDX_2CBACE2F8805AB2F (annonce_id), PRIMARY KEY(id_disp)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (AdresseMailBien VARCHAR(25) NOT NULL, LineBookBien VARCHAR(255) DEFAULT NULL, DescriptionAnnonce VARCHAR(255) DEFAULT NULL, PRIMARY KEY(AdresseMailBien)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id_msg INT AUTO_INCREMENT NOT NULL, visiteur_id INT DEFAULT NULL, annonce_id VARCHAR(25) DEFAULT NULL, msg_time DATETIME NOT NULL, msq_content VARCHAR(255) NOT NULL, INDEX IDX_B6BD307F7F72333D (visiteur_id), INDEX IDX_B6BD307F8805AB2F (annonce_id), PRIMARY KEY(id_msg)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (IdProprietaire INT AUTO_INCREMENT NOT NULL, NomProp VARCHAR(12) DEFAULT NULL, PrenomProp VARCHAR(12) DEFAULT NULL, AdresseMail VARCHAR(25) DEFAULT NULL, IdAgentImmo INT DEFAULT NULL, INDEX IdAgentImmo (IdAgentImmo), PRIMARY KEY(IdProprietaire)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agentimmo (IdAgentImmo INT AUTO_INCREMENT NOT NULL, NomAgent VARCHAR(12) DEFAULT NULL, PrenomAgent VARCHAR(12) DEFAULT NULL, AdresseMail VARCHAR(25) DEFAULT NULL, NumTelAgent VARCHAR(12) DEFAULT NULL, PRIMARY KEY(IdAgentImmo)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visite (id_vis INT AUTO_INCREMENT NOT NULL, annonce_id VARCHAR(25) DEFAULT NULL, visiteur_id INT DEFAULT NULL, date_vis_start DATETIME NOT NULL, date_vis_end DATETIME NOT NULL, INDEX IDX_B09C8CBB8805AB2F (annonce_id), INDEX IDX_B09C8CBB7F72333D (visiteur_id), PRIMARY KEY(id_vis)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteur (IdVisiteur INT AUTO_INCREMENT NOT NULL, NomVisiteur VARCHAR(12) DEFAULT NULL, PrenomVisiteur VARCHAR(12) DEFAULT NULL, AdresseMail VARCHAR(25) DEFAULT NULL, NumTel VARCHAR(12) DEFAULT NULL, PRIMARY KEY(IdVisiteur)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE disponibilite ADD CONSTRAINT FK_2CBACE2FDEB3FFBD FOREIGN KEY (prop_id) REFERENCES proprietaire (idproprietaire)');
        $this->addSql('ALTER TABLE disponibilite ADD CONSTRAINT FK_2CBACE2F8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (adressemailbien)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F7F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (idvisiteur)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (adressemailbien)');
        $this->addSql('ALTER TABLE proprietaire ADD CONSTRAINT FK_69E399D64126E1EA FOREIGN KEY (IdAgentImmo) REFERENCES agentimmo (IdAgentImmo)');
        $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (adressemailbien)');
        $this->addSql('ALTER TABLE visite ADD CONSTRAINT FK_B09C8CBB7F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (idvisiteur)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE disponibilite DROP FOREIGN KEY FK_2CBACE2F8805AB2F');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8805AB2F');
        $this->addSql('ALTER TABLE visite DROP FOREIGN KEY FK_B09C8CBB8805AB2F');
        $this->addSql('ALTER TABLE disponibilite DROP FOREIGN KEY FK_2CBACE2FDEB3FFBD');
        $this->addSql('ALTER TABLE proprietaire DROP FOREIGN KEY FK_69E399D64126E1EA');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F7F72333D');
        $this->addSql('ALTER TABLE visite DROP FOREIGN KEY FK_B09C8CBB7F72333D');
        $this->addSql('DROP TABLE disponibilite');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE agentimmo');
        $this->addSql('DROP TABLE visite');
        $this->addSql('DROP TABLE visiteur');
    }
}
