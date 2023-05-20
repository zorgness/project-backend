<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520161420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ALTER is_pending SET DEFAULT true');
        $this->addSql('ALTER TABLE booking ALTER is_pending DROP NOT NULL');
        $this->addSql('ALTER TABLE booking ALTER is_accepted SET DEFAULT false');
        $this->addSql('ALTER TABLE booking ALTER is_accepted DROP NOT NULL');
        $this->addSql('ALTER TABLE booking ALTER is_rejected SET DEFAULT false');
        $this->addSql('ALTER TABLE booking ALTER is_rejected DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE booking ALTER is_pending DROP DEFAULT');
        $this->addSql('ALTER TABLE booking ALTER is_pending SET NOT NULL');
        $this->addSql('ALTER TABLE booking ALTER is_accepted DROP DEFAULT');
        $this->addSql('ALTER TABLE booking ALTER is_accepted SET NOT NULL');
        $this->addSql('ALTER TABLE booking ALTER is_rejected DROP DEFAULT');
        $this->addSql('ALTER TABLE booking ALTER is_rejected SET NOT NULL');
    }
}
