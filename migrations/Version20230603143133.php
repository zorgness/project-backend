<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230603143133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE activity_event_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE booking_id_seq CASCADE');
        $this->addSql('ALTER TABLE booking DROP CONSTRAINT fk_e00cedde3c0c9956');
        $this->addSql('ALTER TABLE booking DROP CONSTRAINT fk_e00cedde81c06096');
        $this->addSql('ALTER TABLE activity_event DROP CONSTRAINT fk_25ac3c1412469de2');
        $this->addSql('ALTER TABLE activity_event DROP CONSTRAINT fk_25ac3c1461220ea6');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE activity_event');
        $this->addSql('ALTER TABLE account DROP city');
        $this->addSql('ALTER TABLE account DROP description');
        $this->addSql('ALTER TABLE account DROP image_url');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE activity_event_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE booking_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE booking (id INT NOT NULL, user_account_id INT NOT NULL, activity_id INT NOT NULL, is_pending BOOLEAN DEFAULT true, is_accepted BOOLEAN DEFAULT false, is_rejected BOOLEAN DEFAULT false, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e00cedde3c0c9956 ON booking (user_account_id)');
        $this->addSql('CREATE INDEX idx_e00cedde81c06096 ON booking (activity_id)');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(255) NOT NULL, url_image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE activity_event (id INT NOT NULL, category_id INT DEFAULT NULL, creator_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, meeting_point VARCHAR(255) NOT NULL, max_of_people INT NOT NULL, start_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, meeting_time VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_25ac3c1461220ea6 ON activity_event (creator_id)');
        $this->addSql('CREATE INDEX idx_25ac3c1412469de2 ON activity_event (category_id)');
        $this->addSql('COMMENT ON COLUMN activity_event.start_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT fk_e00cedde3c0c9956 FOREIGN KEY (user_account_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT fk_e00cedde81c06096 FOREIGN KEY (activity_id) REFERENCES activity_event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE activity_event ADD CONSTRAINT fk_25ac3c1412469de2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE activity_event ADD CONSTRAINT fk_25ac3c1461220ea6 FOREIGN KEY (creator_id) REFERENCES account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "account" ADD city VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "account" ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "account" ADD image_url VARCHAR(255) NOT NULL');
    }
}
