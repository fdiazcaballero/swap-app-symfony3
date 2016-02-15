<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160215232316 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_2D5B02345D83CC1');
        $this->addSql('DROP INDEX IDX_2D5B0234F92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__city AS SELECT id, state_id, country_id, name FROM city');
        $this->addSql('DROP TABLE city');
        $this->addSql('CREATE TABLE city (id INTEGER NOT NULL, state_id INTEGER NOT NULL, country_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_2D5B02345D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2D5B0234F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO city (id, state_id, country_id, name) SELECT id, state_id, country_id, name FROM __temp__city');
        $this->addSql('DROP TABLE __temp__city');
        $this->addSql('CREATE INDEX IDX_2D5B02345D83CC1 ON city (state_id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234F92F3E70 ON city (country_id)');
        $this->addSql('DROP INDEX IDX_A393D2FBF92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__state AS SELECT id, country_id, name, state_code, is_active FROM state');
        $this->addSql('DROP TABLE state');
        $this->addSql('CREATE TABLE state (id INTEGER NOT NULL, country_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, state_code VARCHAR(3) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_A393D2FBF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO state (id, country_id, name, state_code, is_active) SELECT id, country_id, name, state_code, is_active FROM __temp__state');
        $this->addSql('DROP TABLE __temp__state');
        $this->addSql('CREATE INDEX IDX_A393D2FBF92F3E70 ON state (country_id)');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('DROP INDEX UNIQ_D34A04AD375DE9CC');
        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395');
        $this->addSql('DROP INDEX IDX_D34A04AD5DC6FE57');
        $this->addSql('DROP INDEX IDX_D34A04AD3D3B79A7');
        $this->addSql('DROP INDEX IDX_D34A04AD3F318A3A');
        $this->addSql('DROP INDEX IDX_D34A04ADAA86366');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, user_id, swap_preference_id, category_id, subcategory_id, subsubcategory_id, subsubsubcategory_id, furthersubcategory_id, description, created_at, has_photo, name, condition, years, months FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, user_id INTEGER NOT NULL, swap_preference_id INTEGER DEFAULT NULL, category_id INTEGER NOT NULL, subcategory_id INTEGER NOT NULL, subsubcategory_id INTEGER DEFAULT NULL, subsubsubcategory_id INTEGER DEFAULT NULL, furthersubcategory_id INTEGER DEFAULT NULL, description CLOB NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, has_photo BOOLEAN DEFAULT \'0\' NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, condition VARCHAR(63) NOT NULL COLLATE BINARY, years SMALLINT DEFAULT NULL, months SMALLINT DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_D34A04ADA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD375DE9CC FOREIGN KEY (swap_preference_id) REFERENCES swap_preference (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD5DC6FE57 FOREIGN KEY (subcategory_id) REFERENCES subcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD3D3B79A7 FOREIGN KEY (subsubcategory_id) REFERENCES subsubcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD3F318A3A FOREIGN KEY (subsubsubcategory_id) REFERENCES subsubsubcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04ADAA86366 FOREIGN KEY (furthersubcategory_id) REFERENCES furthersubcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product (id, user_id, swap_preference_id, category_id, subcategory_id, subsubcategory_id, subsubsubcategory_id, furthersubcategory_id, description, created_at, has_photo, name, condition, years, months) SELECT id, user_id, swap_preference_id, category_id, subcategory_id, subsubcategory_id, subsubsubcategory_id, furthersubcategory_id, description, created_at, has_photo, name, condition, years, months FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD375DE9CC ON product (swap_preference_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD5DC6FE57 ON product (subcategory_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD3D3B79A7 ON product (subsubcategory_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD3F318A3A ON product (subsubsubcategory_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADAA86366 ON product (furthersubcategory_id)');
        $this->addSql('DROP INDEX IDX_EDDAD95FE4998C38');
        $this->addSql('DROP INDEX IDX_EDDAD95F19C8086A');
        $this->addSql('DROP INDEX IDX_EDDAD95F7B77E02D');
        $this->addSql('DROP INDEX IDX_EDDAD95F9B2CB5D6');
        $this->addSql('DROP INDEX UNIQ_EDDAD95F4584665A');
        $this->addSql('DROP INDEX IDX_EDDAD95F2380F908');
        $this->addSql('CREATE TEMPORARY TABLE __temp__swap_preference AS SELECT id, product_id, category_preference, subcategory_preference, subsubcategory_preference, subsubsubcategory_preference, furthersubcategory_preference, is_email_alert, description, is_free, is_willing_to_deliver, geographic_preference FROM swap_preference');
        $this->addSql('DROP TABLE swap_preference');
        $this->addSql('CREATE TABLE swap_preference (id INTEGER NOT NULL, product_id INTEGER NOT NULL, category_preference INTEGER DEFAULT NULL, subcategory_preference INTEGER DEFAULT NULL, subsubcategory_preference INTEGER DEFAULT NULL, subsubsubcategory_preference INTEGER DEFAULT NULL, furthersubcategory_preference INTEGER DEFAULT NULL, is_email_alert BOOLEAN DEFAULT \'0\' NOT NULL, description CLOB DEFAULT NULL COLLATE BINARY, is_free BOOLEAN DEFAULT \'0\' NOT NULL, is_willing_to_deliver BOOLEAN DEFAULT \'0\' NOT NULL, geographic_preference TEXT CHECK(geographic_preference IN (\'CNTRY\', \'ST\', \'MA\', \'C\')) DEFAULT \'ST\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_EDDAD95F4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F7B77E02D FOREIGN KEY (category_preference) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F9B2CB5D6 FOREIGN KEY (subcategory_preference) REFERENCES subcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F19C8086A FOREIGN KEY (subsubcategory_preference) REFERENCES subsubcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F2380F908 FOREIGN KEY (subsubsubcategory_preference) REFERENCES subsubsubcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95FE4998C38 FOREIGN KEY (furthersubcategory_preference) REFERENCES furthersubcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO swap_preference (id, product_id, category_preference, subcategory_preference, subsubcategory_preference, subsubsubcategory_preference, furthersubcategory_preference, is_email_alert, description, is_free, is_willing_to_deliver, geographic_preference) SELECT id, product_id, category_preference, subcategory_preference, subsubcategory_preference, subsubsubcategory_preference, furthersubcategory_preference, is_email_alert, description, is_free, is_willing_to_deliver, geographic_preference FROM __temp__swap_preference');
        $this->addSql('DROP TABLE __temp__swap_preference');
        $this->addSql('CREATE INDEX IDX_EDDAD95FE4998C38 ON swap_preference (furthersubcategory_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F19C8086A ON swap_preference (subsubcategory_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F7B77E02D ON swap_preference (category_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F9B2CB5D6 ON swap_preference (subcategory_preference)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDAD95F4584665A ON swap_preference (product_id)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F2380F908 ON swap_preference (subsubsubcategory_preference)');
        $this->addSql('DROP INDEX IDX_C822424F9B22D3C8');
        $this->addSql('DROP INDEX UNIQ_C822424F5E237E06');
        $this->addSql('CREATE TEMPORARY TABLE __temp__furthersubcategory AS SELECT id, parent_subsubsubcategory_id, name, description, swap_preference, is_active FROM furthersubcategory');
        $this->addSql('DROP TABLE furthersubcategory');
        $this->addSql('CREATE TABLE furthersubcategory (id INTEGER NOT NULL, parent_subsubsubcategory_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, swap_preference VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_C822424F9B22D3C8 FOREIGN KEY (parent_subsubsubcategory_id) REFERENCES subsubsubcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO furthersubcategory (id, parent_subsubsubcategory_id, name, description, swap_preference, is_active) SELECT id, parent_subsubsubcategory_id, name, description, swap_preference, is_active FROM __temp__furthersubcategory');
        $this->addSql('DROP TABLE __temp__furthersubcategory');
        $this->addSql('CREATE INDEX IDX_C822424F9B22D3C8 ON furthersubcategory (parent_subsubsubcategory_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C822424F5E237E06 ON furthersubcategory (name)');
        $this->addSql('DROP INDEX UNIQ_DDCA4485E237E06');
        $this->addSql('DROP INDEX IDX_DDCA448796A8F92');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subcategory AS SELECT id, parent_category_id, name, description, swap_preference, is_active FROM subcategory');
        $this->addSql('DROP TABLE subcategory');
        $this->addSql('CREATE TABLE subcategory (id INTEGER NOT NULL, parent_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, swap_preference VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_DDCA448796A8F92 FOREIGN KEY (parent_category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO subcategory (id, parent_category_id, name, description, swap_preference, is_active) SELECT id, parent_category_id, name, description, swap_preference, is_active FROM __temp__subcategory');
        $this->addSql('DROP TABLE __temp__subcategory');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DDCA4485E237E06 ON subcategory (name)');
        $this->addSql('CREATE INDEX IDX_DDCA448796A8F92 ON subcategory (parent_category_id)');
        $this->addSql('DROP INDEX IDX_425CC7FD431B8A5C');
        $this->addSql('DROP INDEX UNIQ_425CC7FD5E237E06');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subsubcategory AS SELECT id, parent_subcategory_id, name, description, swap_preference, is_active FROM subsubcategory');
        $this->addSql('DROP TABLE subsubcategory');
        $this->addSql('CREATE TABLE subsubcategory (id INTEGER NOT NULL, parent_subcategory_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, swap_preference VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_425CC7FD431B8A5C FOREIGN KEY (parent_subcategory_id) REFERENCES subcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO subsubcategory (id, parent_subcategory_id, name, description, swap_preference, is_active) SELECT id, parent_subcategory_id, name, description, swap_preference, is_active FROM __temp__subsubcategory');
        $this->addSql('DROP TABLE __temp__subsubcategory');
        $this->addSql('CREATE INDEX IDX_425CC7FD431B8A5C ON subsubcategory (parent_subcategory_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_425CC7FD5E237E06 ON subsubcategory (name)');
        $this->addSql('DROP INDEX UNIQ_22A1400D5E237E06');
        $this->addSql('DROP INDEX IDX_22A1400D825F84C3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subsubsubcategory AS SELECT id, parent_subsubcategory_id, name, description, swap_preference, is_active FROM subsubsubcategory');
        $this->addSql('DROP TABLE subsubsubcategory');
        $this->addSql('CREATE TABLE subsubsubcategory (id INTEGER NOT NULL, parent_subsubcategory_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, swap_preference VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_22A1400D825F84C3 FOREIGN KEY (parent_subsubcategory_id) REFERENCES subsubcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO subsubsubcategory (id, parent_subsubcategory_id, name, description, swap_preference, is_active) SELECT id, parent_subsubcategory_id, name, description, swap_preference, is_active FROM __temp__subsubsubcategory');
        $this->addSql('DROP TABLE __temp__subsubsubcategory');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_22A1400D5E237E06 ON subsubsubcategory (name)');
        $this->addSql('CREATE INDEX IDX_22A1400D825F84C3 ON subsubsubcategory (parent_subsubcategory_id)');
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

        $this->addSql('DROP INDEX IDX_2D5B02345D83CC1');
        $this->addSql('DROP INDEX IDX_2D5B0234F92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__city AS SELECT id, state_id, country_id, name FROM city');
        $this->addSql('DROP TABLE city');
        $this->addSql('CREATE TABLE city (id INTEGER NOT NULL, state_id INTEGER NOT NULL, country_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO city (id, state_id, country_id, name) SELECT id, state_id, country_id, name FROM __temp__city');
        $this->addSql('DROP TABLE __temp__city');
        $this->addSql('CREATE INDEX IDX_2D5B02345D83CC1 ON city (state_id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234F92F3E70 ON city (country_id)');
        $this->addSql('DROP INDEX UNIQ_957A647992FC23A8');
        $this->addSql('DROP INDEX UNIQ_957A6479A0D96FBF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fos_user AS SELECT id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at FROM fos_user');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('CREATE TABLE fos_user (id INTEGER NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked BOOLEAN NOT NULL, expired BOOLEAN NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, credentials_expired BOOLEAN NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, roles CLOB NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO fos_user (id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at) SELECT id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at FROM __temp__fos_user');
        $this->addSql('DROP TABLE __temp__fos_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A647992FC23A8 ON fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479A0D96FBF ON fos_user (email_canonical)');
        $this->addSql('DROP INDEX UNIQ_C822424F5E237E06');
        $this->addSql('DROP INDEX IDX_C822424F9B22D3C8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__furthersubcategory AS SELECT id, parent_subsubsubcategory_id, name, description, swap_preference, is_active FROM furthersubcategory');
        $this->addSql('DROP TABLE furthersubcategory');
        $this->addSql('CREATE TABLE furthersubcategory (id INTEGER NOT NULL, parent_subsubsubcategory_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB DEFAULT NULL, swap_preference VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO furthersubcategory (id, parent_subsubsubcategory_id, name, description, swap_preference, is_active) SELECT id, parent_subsubsubcategory_id, name, description, swap_preference, is_active FROM __temp__furthersubcategory');
        $this->addSql('DROP TABLE __temp__furthersubcategory');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C822424F5E237E06 ON furthersubcategory (name)');
        $this->addSql('CREATE INDEX IDX_C822424F9B22D3C8 ON furthersubcategory (parent_subsubsubcategory_id)');
        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395');
        $this->addSql('DROP INDEX UNIQ_D34A04AD375DE9CC');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04AD5DC6FE57');
        $this->addSql('DROP INDEX IDX_D34A04AD3D3B79A7');
        $this->addSql('DROP INDEX IDX_D34A04AD3F318A3A');
        $this->addSql('DROP INDEX IDX_D34A04ADAA86366');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, user_id, swap_preference_id, category_id, subcategory_id, subsubcategory_id, subsubsubcategory_id, furthersubcategory_id, name, description, condition, years, months, created_at, has_photo FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, user_id INTEGER NOT NULL, swap_preference_id INTEGER DEFAULT NULL, category_id INTEGER NOT NULL, subcategory_id INTEGER NOT NULL, subsubcategory_id INTEGER DEFAULT NULL, subsubsubcategory_id INTEGER DEFAULT NULL, furthersubcategory_id INTEGER DEFAULT NULL, name VARCHAR(63) NOT NULL, description CLOB NOT NULL, condition VARCHAR(63) NOT NULL, years SMALLINT DEFAULT NULL, months SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL, has_photo BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product (id, user_id, swap_preference_id, category_id, subcategory_id, subsubcategory_id, subsubsubcategory_id, furthersubcategory_id, name, description, condition, years, months, created_at, has_photo) SELECT id, user_id, swap_preference_id, category_id, subcategory_id, subsubcategory_id, subsubsubcategory_id, furthersubcategory_id, name, description, condition, years, months, created_at, has_photo FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD375DE9CC ON product (swap_preference_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD5DC6FE57 ON product (subcategory_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD3D3B79A7 ON product (subsubcategory_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD3F318A3A ON product (subsubsubcategory_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADAA86366 ON product (furthersubcategory_id)');
        $this->addSql('DROP INDEX IDX_A393D2FBF92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__state AS SELECT id, country_id, name, state_code, is_active FROM state');
        $this->addSql('DROP TABLE state');
        $this->addSql('CREATE TABLE state (id INTEGER NOT NULL, country_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, state_code VARCHAR(3) DEFAULT NULL, is_active BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO state (id, country_id, name, state_code, is_active) SELECT id, country_id, name, state_code, is_active FROM __temp__state');
        $this->addSql('DROP TABLE __temp__state');
        $this->addSql('CREATE INDEX IDX_A393D2FBF92F3E70 ON state (country_id)');
        $this->addSql('DROP INDEX UNIQ_DDCA4485E237E06');
        $this->addSql('DROP INDEX IDX_DDCA448796A8F92');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subcategory AS SELECT id, parent_category_id, name, description, swap_preference, is_active FROM subcategory');
        $this->addSql('DROP TABLE subcategory');
        $this->addSql('CREATE TABLE subcategory (id INTEGER NOT NULL, parent_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB DEFAULT NULL, swap_preference VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO subcategory (id, parent_category_id, name, description, swap_preference, is_active) SELECT id, parent_category_id, name, description, swap_preference, is_active FROM __temp__subcategory');
        $this->addSql('DROP TABLE __temp__subcategory');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DDCA4485E237E06 ON subcategory (name)');
        $this->addSql('CREATE INDEX IDX_DDCA448796A8F92 ON subcategory (parent_category_id)');
        $this->addSql('DROP INDEX UNIQ_425CC7FD5E237E06');
        $this->addSql('DROP INDEX IDX_425CC7FD431B8A5C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subsubcategory AS SELECT id, parent_subcategory_id, name, description, swap_preference, is_active FROM subsubcategory');
        $this->addSql('DROP TABLE subsubcategory');
        $this->addSql('CREATE TABLE subsubcategory (id INTEGER NOT NULL, parent_subcategory_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB DEFAULT NULL, swap_preference VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO subsubcategory (id, parent_subcategory_id, name, description, swap_preference, is_active) SELECT id, parent_subcategory_id, name, description, swap_preference, is_active FROM __temp__subsubcategory');
        $this->addSql('DROP TABLE __temp__subsubcategory');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_425CC7FD5E237E06 ON subsubcategory (name)');
        $this->addSql('CREATE INDEX IDX_425CC7FD431B8A5C ON subsubcategory (parent_subcategory_id)');
        $this->addSql('DROP INDEX UNIQ_22A1400D5E237E06');
        $this->addSql('DROP INDEX IDX_22A1400D825F84C3');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subsubsubcategory AS SELECT id, parent_subsubcategory_id, name, description, swap_preference, is_active FROM subsubsubcategory');
        $this->addSql('DROP TABLE subsubsubcategory');
        $this->addSql('CREATE TABLE subsubsubcategory (id INTEGER NOT NULL, parent_subsubcategory_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB DEFAULT NULL, swap_preference VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO subsubsubcategory (id, parent_subsubcategory_id, name, description, swap_preference, is_active) SELECT id, parent_subsubcategory_id, name, description, swap_preference, is_active FROM __temp__subsubsubcategory');
        $this->addSql('DROP TABLE __temp__subsubsubcategory');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_22A1400D5E237E06 ON subsubsubcategory (name)');
        $this->addSql('CREATE INDEX IDX_22A1400D825F84C3 ON subsubsubcategory (parent_subsubcategory_id)');
        $this->addSql('DROP INDEX UNIQ_EDDAD95F4584665A');
        $this->addSql('DROP INDEX IDX_EDDAD95F7B77E02D');
        $this->addSql('DROP INDEX IDX_EDDAD95F9B2CB5D6');
        $this->addSql('DROP INDEX IDX_EDDAD95F19C8086A');
        $this->addSql('DROP INDEX IDX_EDDAD95F2380F908');
        $this->addSql('DROP INDEX IDX_EDDAD95FE4998C38');
        $this->addSql('CREATE TEMPORARY TABLE __temp__swap_preference AS SELECT id, product_id, category_preference, subcategory_preference, subsubcategory_preference, subsubsubcategory_preference, furthersubcategory_preference, description, is_free, is_willing_to_deliver, geographic_preference, is_email_alert FROM swap_preference');
        $this->addSql('DROP TABLE swap_preference');
        $this->addSql('CREATE TABLE swap_preference (id INTEGER NOT NULL, product_id INTEGER NOT NULL, category_preference INTEGER DEFAULT NULL, subcategory_preference INTEGER DEFAULT NULL, subsubcategory_preference INTEGER DEFAULT NULL, subsubsubcategory_preference INTEGER DEFAULT NULL, furthersubcategory_preference INTEGER DEFAULT NULL, description CLOB DEFAULT NULL, is_free BOOLEAN DEFAULT \'0\' NOT NULL, is_willing_to_deliver BOOLEAN DEFAULT \'0\' NOT NULL, is_email_alert BOOLEAN DEFAULT \'0\' NOT NULL, geographic_preference CLOB DEFAULT \'ST\' NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO swap_preference (id, product_id, category_preference, subcategory_preference, subsubcategory_preference, subsubsubcategory_preference, furthersubcategory_preference, description, is_free, is_willing_to_deliver, geographic_preference, is_email_alert) SELECT id, product_id, category_preference, subcategory_preference, subsubcategory_preference, subsubsubcategory_preference, furthersubcategory_preference, description, is_free, is_willing_to_deliver, geographic_preference, is_email_alert FROM __temp__swap_preference');
        $this->addSql('DROP TABLE __temp__swap_preference');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDAD95F4584665A ON swap_preference (product_id)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F7B77E02D ON swap_preference (category_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F9B2CB5D6 ON swap_preference (subcategory_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F19C8086A ON swap_preference (subsubcategory_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F2380F908 ON swap_preference (subsubsubcategory_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95FE4998C38 ON swap_preference (furthersubcategory_preference)');
    }
}
