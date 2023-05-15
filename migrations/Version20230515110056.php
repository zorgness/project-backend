<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515110056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE booking_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE booking (id INT NOT NULL, user_account_id INT NOT NULL, activity_id INT DEFAULT NULL, is_pending BOOLEAN NOT NULL, is_accepted BOOLEAN NOT NULL, is_rejected BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E00CEDDE3C0C9956 ON booking (user_account_id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE81C06096 ON booking (activity_id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE3C0C9956 FOREIGN KEY (user_account_id) REFERENCES "account" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE81C06096 FOREIGN KEY (activity_id) REFERENCES activity_event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE booking_id_seq CASCADE');
        $this->addSql('ALTER TABLE booking DROP CONSTRAINT FK_E00CEDDE3C0C9956');
        $this->addSql('ALTER TABLE booking DROP CONSTRAINT FK_E00CEDDE81C06096');
        $this->addSql('DROP TABLE booking');
    }
}
