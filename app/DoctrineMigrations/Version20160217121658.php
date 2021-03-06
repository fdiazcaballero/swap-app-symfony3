<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160217121658 extends AbstractMigration
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
        $this->addSql('DROP INDEX IDX_D34A04AD397878E9');
        $this->addSql('DROP INDEX UNIQ_D34A04AD375DE9CC');
        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395');
        $this->addSql('DROP INDEX IDX_D34A04ADAA62BF91');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, user_id, swap_preference_id, product_taxonomy_id, product_location_id, description, created_at, has_photo, name, condition, years, months FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, user_id INTEGER NOT NULL, swap_preference_id INTEGER DEFAULT NULL, product_taxonomy_id INTEGER NOT NULL, product_location_id INTEGER NOT NULL, description CLOB NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, has_photo BOOLEAN DEFAULT \'0\' NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, condition VARCHAR(63) NOT NULL COLLATE BINARY, years SMALLINT DEFAULT NULL, months SMALLINT DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_D34A04ADA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD375DE9CC FOREIGN KEY (swap_preference_id) REFERENCES swap_preference (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04AD397878E9 FOREIGN KEY (product_taxonomy_id) REFERENCES product_taxonomy (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D34A04ADAA62BF91 FOREIGN KEY (product_location_id) REFERENCES product_location (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product (id, user_id, swap_preference_id, product_taxonomy_id, product_location_id, description, created_at, has_photo, name, condition, years, months) SELECT id, user_id, swap_preference_id, product_taxonomy_id, product_location_id, description, created_at, has_photo, name, condition, years, months FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04AD397878E9 ON product (product_taxonomy_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD375DE9CC ON product (swap_preference_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADAA62BF91 ON product (product_location_id)');
        $this->addSql('DROP INDEX IDX_952EE35CF92F3E70');
        $this->addSql('DROP INDEX IDX_952EE35C5D83CC1');
        $this->addSql('DROP INDEX IDX_952EE35C8BAC62AF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product_location AS SELECT id, country_id, state_id, city_id FROM product_location');
        $this->addSql('DROP TABLE product_location');
        $this->addSql('CREATE TABLE product_location (id INTEGER NOT NULL, country_id INTEGER NOT NULL, state_id INTEGER NOT NULL, city_id INTEGER DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_952EE35CF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_952EE35C5D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_952EE35C8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product_location (id, country_id, state_id, city_id) SELECT id, country_id, state_id, city_id FROM __temp__product_location');
        $this->addSql('DROP TABLE __temp__product_location');
        $this->addSql('CREATE INDEX IDX_952EE35CF92F3E70 ON product_location (country_id)');
        $this->addSql('CREATE INDEX IDX_952EE35C5D83CC1 ON product_location (state_id)');
        $this->addSql('CREATE INDEX IDX_952EE35C8BAC62AF ON product_location (city_id)');
        $this->addSql('DROP INDEX IDX_36A2D2AAC287B0B5');
        $this->addSql('DROP INDEX IDX_36A2D2AAC4DE02ED');
        $this->addSql('DROP INDEX IDX_36A2D2AAF7BFE87C');
        $this->addSql('DROP INDEX IDX_36A2D2AA3D3B79A7');
        $this->addSql('DROP INDEX IDX_36A2D2AA12469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product_taxonomy AS SELECT id, category_id, sub_category_id, subsubcategory_id, subsubsub_category_id, further_sub_category_id FROM product_taxonomy');
        $this->addSql('DROP TABLE product_taxonomy');
        $this->addSql('CREATE TABLE product_taxonomy (id INTEGER NOT NULL, category_id INTEGER NOT NULL, sub_category_id INTEGER NOT NULL, subsubcategory_id INTEGER DEFAULT NULL, subsubsub_category_id INTEGER DEFAULT NULL, further_sub_category_id INTEGER DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_36A2D2AA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_36A2D2AAF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_36A2D2AA3D3B79A7 FOREIGN KEY (subsubcategory_id) REFERENCES subsub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_36A2D2AAC4DE02ED FOREIGN KEY (subsubsub_category_id) REFERENCES subsubsub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_36A2D2AAC287B0B5 FOREIGN KEY (further_sub_category_id) REFERENCES further_subcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product_taxonomy (id, category_id, sub_category_id, subsubcategory_id, subsubsub_category_id, further_sub_category_id) SELECT id, category_id, sub_category_id, subsubcategory_id, subsubsub_category_id, further_sub_category_id FROM __temp__product_taxonomy');
        $this->addSql('DROP TABLE __temp__product_taxonomy');
        $this->addSql('CREATE INDEX IDX_36A2D2AAC287B0B5 ON product_taxonomy (further_sub_category_id)');
        $this->addSql('CREATE INDEX IDX_36A2D2AAC4DE02ED ON product_taxonomy (subsubsub_category_id)');
        $this->addSql('CREATE INDEX IDX_36A2D2AAF7BFE87C ON product_taxonomy (sub_category_id)');
        $this->addSql('CREATE INDEX IDX_36A2D2AA3D3B79A7 ON product_taxonomy (subsubcategory_id)');
        $this->addSql('CREATE INDEX IDX_36A2D2AA12469DE2 ON product_taxonomy (category_id)');
        $this->addSql('DROP INDEX IDX_EDDAD95F9C6274A4');
        $this->addSql('DROP INDEX IDX_EDDAD95F4C57EA83');
        $this->addSql('DROP INDEX IDX_EDDAD95F2D84B91C');
        $this->addSql('DROP INDEX IDX_EDDAD95F19C8086A');
        $this->addSql('DROP INDEX IDX_EDDAD95F7B77E02D');
        $this->addSql('DROP INDEX UNIQ_EDDAD95F4584665A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__swap_preference AS SELECT id, product_id, category_preference, sub_category_preference, subsubcategory_preference, subsubsub_category_preference, furthersubcategory_preference, is_email_alert, description, is_free, is_willing_to_deliver, geographic_preference FROM swap_preference');
        $this->addSql('DROP TABLE swap_preference');
        $this->addSql('CREATE TABLE swap_preference (id INTEGER NOT NULL, product_id INTEGER NOT NULL, category_preference INTEGER DEFAULT NULL, sub_category_preference INTEGER DEFAULT NULL, subsubcategory_preference INTEGER DEFAULT NULL, subsubsub_category_preference INTEGER DEFAULT NULL, furthersubcategory_preference INTEGER DEFAULT NULL, is_email_alert BOOLEAN DEFAULT \'0\' NOT NULL, description CLOB DEFAULT NULL COLLATE BINARY, is_free BOOLEAN DEFAULT \'0\' NOT NULL, is_willing_to_deliver BOOLEAN DEFAULT \'0\' NOT NULL, geographic_preference TEXT CHECK(geographic_preference IN (\'CNTRY\', \'ST\', \'MA\', \'C\')) DEFAULT \'ST\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_EDDAD95F4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F7B77E02D FOREIGN KEY (category_preference) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F2D84B91C FOREIGN KEY (sub_category_preference) REFERENCES sub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F19C8086A FOREIGN KEY (subsubcategory_preference) REFERENCES subsub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F4C57EA83 FOREIGN KEY (subsubsub_category_preference) REFERENCES subsubsub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_EDDAD95F9C6274A4 FOREIGN KEY (FurtherSubCategory_preference) REFERENCES further_subcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO swap_preference (id, product_id, category_preference, sub_category_preference, subsubcategory_preference, subsubsub_category_preference, furthersubcategory_preference, is_email_alert, description, is_free, is_willing_to_deliver, geographic_preference) SELECT id, product_id, category_preference, sub_category_preference, subsubcategory_preference, subsubsub_category_preference, furthersubcategory_preference, is_email_alert, description, is_free, is_willing_to_deliver, geographic_preference FROM __temp__swap_preference');
        $this->addSql('DROP TABLE __temp__swap_preference');
        $this->addSql('CREATE INDEX IDX_EDDAD95F9C6274A4 ON swap_preference (furthersubcategory_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F4C57EA83 ON swap_preference (subsubsub_category_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F2D84B91C ON swap_preference (sub_category_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F19C8086A ON swap_preference (subsubcategory_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F7B77E02D ON swap_preference (category_preference)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDAD95F4584665A ON swap_preference (product_id)');
        $this->addSql('DROP INDEX IDX_CDC07DF397C98284');
        $this->addSql('DROP INDEX UNIQ_CDC07DF35E237E06');
        $this->addSql('CREATE TEMPORARY TABLE __temp__further_subcategory AS SELECT id, parent_subsubsub_category_id, name, description, swap_preference, is_active FROM further_subcategory');
        $this->addSql('DROP TABLE further_subcategory');
        $this->addSql('CREATE TABLE further_subcategory (id INTEGER NOT NULL, parent_subsubsub_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, swap_preference VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_CDC07DF397C98284 FOREIGN KEY (parent_subsubsub_category_id) REFERENCES subsubsub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO further_subcategory (id, parent_subsubsub_category_id, name, description, swap_preference, is_active) SELECT id, parent_subsubsub_category_id, name, description, swap_preference, is_active FROM __temp__further_subcategory');
        $this->addSql('DROP TABLE __temp__further_subcategory');
        $this->addSql('CREATE INDEX IDX_CDC07DF397C98284 ON further_subcategory (parent_subsubsub_category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CDC07DF35E237E06 ON further_subcategory (name)');
        $this->addSql('DROP INDEX IDX_BCE3F798796A8F92');
        $this->addSql('DROP INDEX UNIQ_BCE3F7985E237E06');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sub_category AS SELECT id, parent_category_id, name, description, swap_preference, is_active FROM sub_category');
        $this->addSql('DROP TABLE sub_category');
        $this->addSql('CREATE TABLE sub_category (id INTEGER NOT NULL, parent_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, swap_preference VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_BCE3F798796A8F92 FOREIGN KEY (parent_category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO sub_category (id, parent_category_id, name, description, swap_preference, is_active) SELECT id, parent_category_id, name, description, swap_preference, is_active FROM __temp__sub_category');
        $this->addSql('DROP TABLE __temp__sub_category');
        $this->addSql('CREATE INDEX IDX_BCE3F798796A8F92 ON sub_category (parent_category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BCE3F7985E237E06 ON sub_category (name)');
        $this->addSql('DROP INDEX IDX_7A730F86073EC80');
        $this->addSql('DROP INDEX UNIQ_7A730F85E237E06');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subsub_category AS SELECT id, parent_sub_category_id, name, description, swap_preference, is_active FROM subsub_category');
        $this->addSql('DROP TABLE subsub_category');
        $this->addSql('CREATE TABLE subsub_category (id INTEGER NOT NULL, parent_sub_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, swap_preference VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_7A730F86073EC80 FOREIGN KEY (parent_sub_category_id) REFERENCES sub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO subsub_category (id, parent_sub_category_id, name, description, swap_preference, is_active) SELECT id, parent_sub_category_id, name, description, swap_preference, is_active FROM __temp__subsub_category');
        $this->addSql('DROP TABLE __temp__subsub_category');
        $this->addSql('CREATE INDEX IDX_7A730F86073EC80 ON subsub_category (parent_sub_category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A730F85E237E06 ON subsub_category (name)');
        $this->addSql('DROP INDEX IDX_BA7A3F632265B');
        $this->addSql('DROP INDEX UNIQ_BA7A3F635E237E06');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subsubsub_category AS SELECT id, parent_subsub_category_id, name, description, swap_preference, is_active FROM subsubsub_category');
        $this->addSql('DROP TABLE subsubsub_category');
        $this->addSql('CREATE TABLE subsubsub_category (id INTEGER NOT NULL, parent_subsub_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, swap_preference VARCHAR(255) DEFAULT NULL COLLATE BINARY, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_BA7A3F632265B FOREIGN KEY (parent_subsub_category_id) REFERENCES subsub_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO subsubsub_category (id, parent_subsub_category_id, name, description, swap_preference, is_active) SELECT id, parent_subsub_category_id, name, description, swap_preference, is_active FROM __temp__subsubsub_category');
        $this->addSql('DROP TABLE __temp__subsubsub_category');
        $this->addSql('CREATE INDEX IDX_BA7A3F632265B ON subsubsub_category (parent_subsub_category_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BA7A3F635E237E06 ON subsubsub_category (name)');
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
        $this->addSql('DROP INDEX UNIQ_CDC07DF35E237E06');
        $this->addSql('DROP INDEX IDX_CDC07DF397C98284');
        $this->addSql('CREATE TEMPORARY TABLE __temp__further_subcategory AS SELECT id, parent_subsubsub_category_id, name, description, swap_preference, is_active FROM further_subcategory');
        $this->addSql('DROP TABLE further_subcategory');
        $this->addSql('CREATE TABLE further_subcategory (id INTEGER NOT NULL, parent_subsubsub_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB DEFAULT NULL, swap_preference VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO further_subcategory (id, parent_subsubsub_category_id, name, description, swap_preference, is_active) SELECT id, parent_subsubsub_category_id, name, description, swap_preference, is_active FROM __temp__further_subcategory');
        $this->addSql('DROP TABLE __temp__further_subcategory');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CDC07DF35E237E06 ON further_subcategory (name)');
        $this->addSql('CREATE INDEX IDX_CDC07DF397C98284 ON further_subcategory (parent_subsubsub_category_id)');
        $this->addSql('DROP INDEX IDX_D34A04ADA76ED395');
        $this->addSql('DROP INDEX UNIQ_D34A04AD375DE9CC');
        $this->addSql('DROP INDEX IDX_D34A04AD397878E9');
        $this->addSql('DROP INDEX IDX_D34A04ADAA62BF91');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, user_id, swap_preference_id, product_taxonomy_id, product_location_id, name, description, condition, years, months, created_at, has_photo FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER NOT NULL, user_id INTEGER NOT NULL, swap_preference_id INTEGER DEFAULT NULL, product_taxonomy_id INTEGER NOT NULL, product_location_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB NOT NULL, condition VARCHAR(63) NOT NULL, years SMALLINT DEFAULT NULL, months SMALLINT DEFAULT NULL, created_at DATETIME NOT NULL, has_photo BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product (id, user_id, swap_preference_id, product_taxonomy_id, product_location_id, name, description, condition, years, months, created_at, has_photo) SELECT id, user_id, swap_preference_id, product_taxonomy_id, product_location_id, name, description, condition, years, months, created_at, has_photo FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04ADA76ED395 ON product (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04AD375DE9CC ON product (swap_preference_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD397878E9 ON product (product_taxonomy_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADAA62BF91 ON product (product_location_id)');
        $this->addSql('DROP INDEX IDX_952EE35CF92F3E70');
        $this->addSql('DROP INDEX IDX_952EE35C5D83CC1');
        $this->addSql('DROP INDEX IDX_952EE35C8BAC62AF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product_location AS SELECT id, country_id, state_id, city_id FROM product_location');
        $this->addSql('DROP TABLE product_location');
        $this->addSql('CREATE TABLE product_location (id INTEGER NOT NULL, country_id INTEGER NOT NULL, state_id INTEGER NOT NULL, city_id INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product_location (id, country_id, state_id, city_id) SELECT id, country_id, state_id, city_id FROM __temp__product_location');
        $this->addSql('DROP TABLE __temp__product_location');
        $this->addSql('CREATE INDEX IDX_952EE35CF92F3E70 ON product_location (country_id)');
        $this->addSql('CREATE INDEX IDX_952EE35C5D83CC1 ON product_location (state_id)');
        $this->addSql('CREATE INDEX IDX_952EE35C8BAC62AF ON product_location (city_id)');
        $this->addSql('DROP INDEX IDX_36A2D2AA12469DE2');
        $this->addSql('DROP INDEX IDX_36A2D2AAF7BFE87C');
        $this->addSql('DROP INDEX IDX_36A2D2AA3D3B79A7');
        $this->addSql('DROP INDEX IDX_36A2D2AAC4DE02ED');
        $this->addSql('DROP INDEX IDX_36A2D2AAC287B0B5');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product_taxonomy AS SELECT id, category_id, sub_category_id, subsubcategory_id, subsubsub_category_id, further_sub_category_id FROM product_taxonomy');
        $this->addSql('DROP TABLE product_taxonomy');
        $this->addSql('CREATE TABLE product_taxonomy (id INTEGER NOT NULL, category_id INTEGER NOT NULL, sub_category_id INTEGER NOT NULL, subsubcategory_id INTEGER DEFAULT NULL, subsubsub_category_id INTEGER DEFAULT NULL, further_sub_category_id INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO product_taxonomy (id, category_id, sub_category_id, subsubcategory_id, subsubsub_category_id, further_sub_category_id) SELECT id, category_id, sub_category_id, subsubcategory_id, subsubsub_category_id, further_sub_category_id FROM __temp__product_taxonomy');
        $this->addSql('DROP TABLE __temp__product_taxonomy');
        $this->addSql('CREATE INDEX IDX_36A2D2AA12469DE2 ON product_taxonomy (category_id)');
        $this->addSql('CREATE INDEX IDX_36A2D2AAF7BFE87C ON product_taxonomy (sub_category_id)');
        $this->addSql('CREATE INDEX IDX_36A2D2AA3D3B79A7 ON product_taxonomy (subsubcategory_id)');
        $this->addSql('CREATE INDEX IDX_36A2D2AAC4DE02ED ON product_taxonomy (subsubsub_category_id)');
        $this->addSql('CREATE INDEX IDX_36A2D2AAC287B0B5 ON product_taxonomy (further_sub_category_id)');
        $this->addSql('DROP INDEX IDX_A393D2FBF92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__state AS SELECT id, country_id, name, state_code, is_active FROM state');
        $this->addSql('DROP TABLE state');
        $this->addSql('CREATE TABLE state (id INTEGER NOT NULL, country_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, state_code VARCHAR(3) DEFAULT NULL, is_active BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO state (id, country_id, name, state_code, is_active) SELECT id, country_id, name, state_code, is_active FROM __temp__state');
        $this->addSql('DROP TABLE __temp__state');
        $this->addSql('CREATE INDEX IDX_A393D2FBF92F3E70 ON state (country_id)');
        $this->addSql('DROP INDEX UNIQ_BCE3F7985E237E06');
        $this->addSql('DROP INDEX IDX_BCE3F798796A8F92');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sub_category AS SELECT id, parent_category_id, name, description, swap_preference, is_active FROM sub_category');
        $this->addSql('DROP TABLE sub_category');
        $this->addSql('CREATE TABLE sub_category (id INTEGER NOT NULL, parent_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB DEFAULT NULL, swap_preference VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO sub_category (id, parent_category_id, name, description, swap_preference, is_active) SELECT id, parent_category_id, name, description, swap_preference, is_active FROM __temp__sub_category');
        $this->addSql('DROP TABLE __temp__sub_category');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BCE3F7985E237E06 ON sub_category (name)');
        $this->addSql('CREATE INDEX IDX_BCE3F798796A8F92 ON sub_category (parent_category_id)');
        $this->addSql('DROP INDEX UNIQ_7A730F85E237E06');
        $this->addSql('DROP INDEX IDX_7A730F86073EC80');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subsub_category AS SELECT id, parent_sub_category_id, name, description, swap_preference, is_active FROM subsub_category');
        $this->addSql('DROP TABLE subsub_category');
        $this->addSql('CREATE TABLE subsub_category (id INTEGER NOT NULL, parent_sub_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB DEFAULT NULL, swap_preference VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO subsub_category (id, parent_sub_category_id, name, description, swap_preference, is_active) SELECT id, parent_sub_category_id, name, description, swap_preference, is_active FROM __temp__subsub_category');
        $this->addSql('DROP TABLE __temp__subsub_category');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A730F85E237E06 ON subsub_category (name)');
        $this->addSql('CREATE INDEX IDX_7A730F86073EC80 ON subsub_category (parent_sub_category_id)');
        $this->addSql('DROP INDEX UNIQ_BA7A3F635E237E06');
        $this->addSql('DROP INDEX IDX_BA7A3F632265B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__subsubsub_category AS SELECT id, parent_subsub_category_id, name, description, swap_preference, is_active FROM subsubsub_category');
        $this->addSql('DROP TABLE subsubsub_category');
        $this->addSql('CREATE TABLE subsubsub_category (id INTEGER NOT NULL, parent_subsub_category_id INTEGER NOT NULL, name VARCHAR(63) NOT NULL, description CLOB DEFAULT NULL, swap_preference VARCHAR(255) DEFAULT NULL, is_active BOOLEAN DEFAULT \'1\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO subsubsub_category (id, parent_subsub_category_id, name, description, swap_preference, is_active) SELECT id, parent_subsub_category_id, name, description, swap_preference, is_active FROM __temp__subsubsub_category');
        $this->addSql('DROP TABLE __temp__subsubsub_category');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BA7A3F635E237E06 ON subsubsub_category (name)');
        $this->addSql('CREATE INDEX IDX_BA7A3F632265B ON subsubsub_category (parent_subsub_category_id)');
        $this->addSql('DROP INDEX UNIQ_EDDAD95F4584665A');
        $this->addSql('DROP INDEX IDX_EDDAD95F7B77E02D');
        $this->addSql('DROP INDEX IDX_EDDAD95F2D84B91C');
        $this->addSql('DROP INDEX IDX_EDDAD95F19C8086A');
        $this->addSql('DROP INDEX IDX_EDDAD95F4C57EA83');
        $this->addSql('DROP INDEX IDX_EDDAD95F9C6274A4');
        $this->addSql('CREATE TEMPORARY TABLE __temp__swap_preference AS SELECT id, product_id, category_preference, sub_category_preference, subsubcategory_preference, subsubsub_category_preference, description, is_free, is_willing_to_deliver, geographic_preference, is_email_alert, FurtherSubCategory_preference FROM swap_preference');
        $this->addSql('DROP TABLE swap_preference');
        $this->addSql('CREATE TABLE swap_preference (id INTEGER NOT NULL, product_id INTEGER NOT NULL, category_preference INTEGER DEFAULT NULL, sub_category_preference INTEGER DEFAULT NULL, subsubcategory_preference INTEGER DEFAULT NULL, subsubsub_category_preference INTEGER DEFAULT NULL, description CLOB DEFAULT NULL, is_free BOOLEAN DEFAULT \'0\' NOT NULL, is_willing_to_deliver BOOLEAN DEFAULT \'0\' NOT NULL, is_email_alert BOOLEAN DEFAULT \'0\' NOT NULL, FurtherSubCategory_preference INTEGER DEFAULT NULL, geographic_preference CLOB DEFAULT \'ST\' NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO swap_preference (id, product_id, category_preference, sub_category_preference, subsubcategory_preference, subsubsub_category_preference, description, is_free, is_willing_to_deliver, geographic_preference, is_email_alert, FurtherSubCategory_preference) SELECT id, product_id, category_preference, sub_category_preference, subsubcategory_preference, subsubsub_category_preference, description, is_free, is_willing_to_deliver, geographic_preference, is_email_alert, FurtherSubCategory_preference FROM __temp__swap_preference');
        $this->addSql('DROP TABLE __temp__swap_preference');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EDDAD95F4584665A ON swap_preference (product_id)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F7B77E02D ON swap_preference (category_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F2D84B91C ON swap_preference (sub_category_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F19C8086A ON swap_preference (subsubcategory_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F4C57EA83 ON swap_preference (subsubsub_category_preference)');
        $this->addSql('CREATE INDEX IDX_EDDAD95F9C6274A4 ON swap_preference (FurtherSubCategory_preference)');
    }
}
