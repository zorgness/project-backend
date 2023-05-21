<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230521103512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX idx_e00cedde3c0c9956');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDE3C0C9956 ON booking (user_account_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_E00CEDDE3C0C9956');
        $this->addSql('CREATE INDEX idx_e00cedde3c0c9956 ON booking (user_account_id)');
    }
}
