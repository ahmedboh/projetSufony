<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200621232333 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_cli VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, adresse VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_cli_id INT NOT NULL, id_service_id INT NOT NULL, date_r DATETIME NOT NULL, etat VARCHAR(50) NOT NULL, INDEX IDX_42C849559A79575D (id_cli_id), INDEX IDX_42C8495548D62931 (id_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559A79575D FOREIGN KEY (id_cli_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495548D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559A79575D');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495548D62931');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE service');
    }
}
