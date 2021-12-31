<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211229043655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE property ADD nbplaces INT NOT NULL, ADD nbportes INT NOT NULL, ADD couleur VARCHAR(255) NOT NULL, ADD nbchevaux INT NOT NULL, ADD price INT NOT NULL, ADD assurance INT NOT NULL, ADD marque VARCHAR(255) NOT NULL, ADD origin VARCHAR(255) NOT NULL, ADD serie VARCHAR(255) NOT NULL, ADD sold TINYINT(1) DEFAULT \'0\' NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE property DROP nbplaces, DROP nbportes, DROP couleur, DROP nbchevaux, DROP price, DROP assurance, DROP marque, DROP origin, DROP serie, DROP sold, DROP created_at');
    }
}
