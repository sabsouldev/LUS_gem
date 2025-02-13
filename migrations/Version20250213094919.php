<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250213094919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mook (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, fichier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cotisation ADD adherent_id INT DEFAULT NULL, ADD montant DOUBLE PRECISION NOT NULL, ADD date_paiement DATETIME NOT NULL, ADD statut VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE cotisation ADD CONSTRAINT FK_AE64D2ED25F06C53 FOREIGN KEY (adherent_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AE64D2ED25F06C53 ON cotisation (adherent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mook');
        $this->addSql('ALTER TABLE cotisation DROP FOREIGN KEY FK_AE64D2ED25F06C53');
        $this->addSql('DROP INDEX UNIQ_AE64D2ED25F06C53 ON cotisation');
        $this->addSql('ALTER TABLE cotisation DROP adherent_id, DROP montant, DROP date_paiement, DROP statut');
    }
}
