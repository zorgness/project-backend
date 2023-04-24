<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424181328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE activity_event_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE activity_event (id INT NOT NULL, category_id INT DEFAULT NULL, creator_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, meeting_point VARCHAR(255) NOT NULL, max_of_people INT NOT NULL, start_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_25AC3C1412469DE2 ON activity_event (category_id)');
        $this->addSql('CREATE INDEX IDX_25AC3C1461220EA6 ON activity_event (creator_id)');
        $this->addSql('COMMENT ON COLUMN activity_event.start_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE activity_event ADD CONSTRAINT FK_25AC3C1412469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE activity_event ADD CONSTRAINT FK_25AC3C1461220EA6 FOREIGN KEY (creator_id) REFERENCES "account" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE activity_event_id_seq CASCADE');
        $this->addSql('ALTER TABLE activity_event DROP CONSTRAINT FK_25AC3C1412469DE2');
        $this->addSql('ALTER TABLE activity_event DROP CONSTRAINT FK_25AC3C1461220EA6');
        $this->addSql('DROP TABLE activity_event');
    }
}
