<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160204000400 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('DROP INDEX UNIQ_D34A04AD375DE9CC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, swap_preference_id, category_id, name, description, created_at, is_free, has_photo FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, swap_preference_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, name VARCHAR(100) NOT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, is_free BOOLEAN DEFAULT \'0\' NOT NULL, has_photo BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_D34A04AD375DE9CC FOREIGN KEY (swap_preference_id) REFERENCES swap_preference (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product (id, swap_preference_id, category_id, name, description, created_at, is_free, has_photo) SELECT id, swap_preference_id, category_id, name, description, created_at, is_free, has_photo FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD375DE9CC ON product (swap_preference_id)');
        $this->addSql('DROP INDEX IDX_A393D2FBF92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__state AS SELECT id, country_id, name, state_code, is_active FROM state');
        $this->addSql('DROP TABLE state');
        $this->addSql('CREATE TABLE state (id INTEGER NOT NULL, country_id INTEGER DEFAULT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, state_code VARCHAR(3) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_A393D2FBF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO state (id, country_id, name, state_code, is_active) SELECT id, country_id, name, state_code, is_active FROM __temp__state');
        $this->addSql('DROP TABLE __temp__state');
        $this->addSql('CREATE INDEX IDX_A393D2FBF92F3E70 ON state (country_id)');
        $this->addSql('DROP INDEX IDX_EDDAD95F340DC104');
        $this->addSql('DROP INDEX IDX_EDDAD95FAD0490BE');
        $this->addSql('DROP INDEX UNIQ_EDDAD95F4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__swap_preference AS SELECT id, product_id, category_preference_1, category_preference_2 FROM swap_preference');
        $this->addSql('DROP TABLE swap_preference');
        $this->addSql('CREATE TABLE swap_preference (id INTEGER NOT NULL, product_id INTEGER DEFAULT NULL, category_preference_1 INTEGER DEFAULT NULL, category_preference_2 INTEGER DEFAULT NULL, geographic_preference TEXT CHECK(geographic_preference IN (\'CNTRY\', \'ST\', \'MA\', \'C\')) DEFAULT \'ST\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_EDDAD95F4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95FAD0490BE FOREIGN KEY (category_preference_1) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F340DC104 FOREIGN KEY (category_preference_2) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO swap_preference (id, product_id, category_preference_1, category_preference_2) SELECT id, product_id, category_preference_1, category_preference_2 FROM __temp__swap_preference');
        $this->addSql('DROP TABLE __temp__swap_preference');
        $this->addSql('CREATE INDEX IDX_EDDAD95F340DC104 ON swap_preference (category_preference_2)');
        $this->addSql('CREATE INDEX IDX_EDDAD95FAD0490BE ON swap_preference (category_preference_1)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDAD95F4584665A ON swap_preference (product_id)');
        $this->addSql('DROP INDEX UNIQ_957A647992FC23A8');
        $this->addSql('DROP INDEX UNIQ_957A6479A0D96FBF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user AS SELECT id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, credentials_expired, credentials_expire_at, roles FROM fos_user');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('CREATE TABLE fos_user (id INTEGER NOT NULL, username VARCHAR(255) NOT NULL COLLATE BINARY, username_canonical VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, email_canonical VARCHAR(255) NOT NULL COLLATE BINARY, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, last_login DATETIME DEFAULT NULL, locked BOOLEAN NOT NULL, expired BOOLEAN NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL COLLATE BINARY, password_requested_at DATETIME DEFAULT NULL, credentials_expired BOOLEAN NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, roles CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO fos_user (id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, credentials_expired, credentials_expire_at, roles) SELECT id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, credentials_expired, credentials_expire_at, roles FROM __temp__fos_user');
        $this->addSql('DROP TABLE __temp__fos_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647992FC23A8 ON fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479A0D96FBF ON fos_user (email_canonical)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX UNIQ_957A647992FC23A8');
        $this->addSql('DROP INDEX UNIQ_957A6479A0D96FBF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user AS SELECT id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at FROM fos_user');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('CREATE TABLE fos_user (id INTEGER NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked BOOLEAN NOT NULL, expired BOOLEAN NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, credentials_expired BOOLEAN NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, roles CLOB NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO fos_user (id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at) SELECT id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at FROM __temp__fos_user');
        $this->addSql('DROP TABLE __temp__fos_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647992FC23A8 ON fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479A0D96FBF ON fos_user (email_canonical)');
        $this->addSql('DROP INDEX UNIQ_D34A04AD375DE9CC');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, swap_preference_id, category_id, name, description, created_at, is_free, has_photo FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, swap_preference_id INTEGER DEFAULT NULL, category_id INTEGER DEFAULT NULL, name VARCHAR(100) NOT NULL, description CLOB NOT NULL, created_at DATETIME NOT NULL, is_free BOOLEAN DEFAULT \'0\' NOT NULL, has_photo BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product (id, swap_preference_id, category_id, name, description, created_at, is_free, has_photo) SELECT id, swap_preference_id, category_id, name, description, created_at, is_free, has_photo FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD375DE9CC ON product (swap_preference_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('DROP INDEX IDX_A393D2FBF92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__state AS SELECT id, country_id, name, state_code, is_active FROM state');
        $this->addSql('DROP TABLE state');
        $this->addSql('CREATE TABLE state (id INTEGER NOT NULL, country_id INTEGER DEFAULT NULL, name VARCHAR(63) NOT NULL, state_code VARCHAR(3) DEFAULT NULL, is_active BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO state (id, country_id, name, state_code, is_active) SELECT id, country_id, name, state_code, is_active FROM __temp__state');
        $this->addSql('DROP TABLE __temp__state');
        $this->addSql('CREATE INDEX IDX_A393D2FBF92F3E70 ON state (country_id)');
        $this->addSql('DROP INDEX UNIQ_EDDAD95F4584665A');
        $this->addSql('DROP INDEX IDX_EDDAD95FAD0490BE');
        $this->addSql('DROP INDEX IDX_EDDAD95F340DC104');
        $this->addSql('CREATE TEMPORARY TABLE __temp__swap_preference AS SELECT id, product_id, category_preference_1, category_preference_2 FROM swap_preference');
        $this->addSql('DROP TABLE swap_preference');
        $this->addSql('CREATE TABLE swap_preference (id INTEGER NOT NULL, product_id INTEGER DEFAULT NULL, category_preference_1 INTEGER DEFAULT NULL, category_preference_2 INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO swap_preference (id, product_id, category_preference_1, category_preference_2) SELECT id, product_id, category_preference_1, category_preference_2 FROM __temp__swap_preference');
        $this->addSql('DROP TABLE __temp__swap_preference');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDAD95F4584665A ON swap_preference (product_id)');
        $this->addSql('CREATE INDEX IDX_EDDAD95FAD0490BE ON swap_preference (category_preference_1)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F340DC104 ON swap_preference (category_preference_2)');
    }
}
