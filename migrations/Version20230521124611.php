<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230521124611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP CONSTRAINT FK_E00CEDDE81C06096');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE81C06096 FOREIGN KEY (activity_id) REFERENCES activity_event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE booking DROP CONSTRAINT fk_e00cedde81c06096');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT fk_e00cedde81c06096 FOREIGN KEY (activity_id) REFERENCES activity_event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
