<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191029084138 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955BC0ADC46');
        $this->addSql('DROP INDEX IDX_3F9D8955BC0ADC46 ON voyage');
        $this->addSql('ALTER TABLE voyage CHANGE id_destination_id destination_id INT NOT NULL');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('CREATE INDEX IDX_3F9D8955816C6140 ON voyage (destination_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955816C6140');
        $this->addSql('DROP INDEX IDX_3F9D8955816C6140 ON voyage');
        $this->addSql('ALTER TABLE voyage CHANGE destination_id id_destination_id INT NOT NULL');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955BC0ADC46 FOREIGN KEY (id_destination_id) REFERENCES destination (id)');
        $this->addSql('CREATE INDEX IDX_3F9D8955BC0ADC46 ON voyage (id_destination_id)');
    }
}
