<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630001757 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE medical_files CHANGE qte_smoking_id qte_smoking_id INT DEFAULT NULL, CHANGE qtealcohol_id qtealcohol_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient_informations CHANGE specialisation_id specialisation_id INT DEFAULT NULL, CHANGE tourisme_region_id tourisme_region_id INT DEFAULT NULL, CHANGE housing_id housing_id INT DEFAULT NULL, CHANGE patient_folder_id patient_folder_id INT DEFAULT NULL, CHANGE patient_doctor_id patient_doctor_id INT DEFAULT NULL, CHANGE age age INT DEFAULT NULL, CHANGE sexe sexe VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE spec_id spec_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE current_disease ADD medical_files_id INT DEFAULT NULL, CHANGE disease_name disease_name VARCHAR(255) DEFAULT NULL, CHANGE disease_date disease_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE current_disease ADD CONSTRAINT FK_A536EF44DF7CB678 FOREIGN KEY (medical_files_id) REFERENCES medical_files (id)');
        $this->addSql('CREATE INDEX IDX_A536EF44DF7CB678 ON current_disease (medical_files_id)');
        $this->addSql('ALTER TABLE current_treatments ADD medical_files_id INT DEFAULT NULL, CHANGE treatment_name treatment_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE current_treatments ADD CONSTRAINT FK_95F3077FDF7CB678 FOREIGN KEY (medical_files_id) REFERENCES medical_files (id)');
        $this->addSql('CREATE INDEX IDX_95F3077FDF7CB678 ON current_treatments (medical_files_id)');
        $this->addSql('ALTER TABLE previous_medical_operation ADD medical_files_id INT DEFAULT NULL, CHANGE medical_operation_type medical_operation_type VARCHAR(255) DEFAULT NULL, CHANGE operation_date operation_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE previous_medical_operation ADD CONSTRAINT FK_ED67C1E6DF7CB678 FOREIGN KEY (medical_files_id) REFERENCES medical_files (id)');
        $this->addSql('CREATE INDEX IDX_ED67C1E6DF7CB678 ON previous_medical_operation (medical_files_id)');
        $this->addSql('ALTER TABLE tourisme_region CHANGE medical_city_id medical_city_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE current_disease DROP FOREIGN KEY FK_A536EF44DF7CB678');
        $this->addSql('DROP INDEX IDX_A536EF44DF7CB678 ON current_disease');
        $this->addSql('ALTER TABLE current_disease DROP medical_files_id, CHANGE disease_name disease_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE disease_date disease_date DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE current_treatments DROP FOREIGN KEY FK_95F3077FDF7CB678');
        $this->addSql('DROP INDEX IDX_95F3077FDF7CB678 ON current_treatments');
        $this->addSql('ALTER TABLE current_treatments DROP medical_files_id, CHANGE treatment_name treatment_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE medical_files CHANGE qte_smoking_id qte_smoking_id INT DEFAULT NULL, CHANGE qtealcohol_id qtealcohol_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient_informations CHANGE specialisation_id specialisation_id INT DEFAULT NULL, CHANGE tourisme_region_id tourisme_region_id INT DEFAULT NULL, CHANGE housing_id housing_id INT DEFAULT NULL, CHANGE patient_folder_id patient_folder_id INT DEFAULT NULL, CHANGE patient_doctor_id patient_doctor_id INT DEFAULT NULL, CHANGE age age INT DEFAULT NULL, CHANGE sexe sexe VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE previous_medical_operation DROP FOREIGN KEY FK_ED67C1E6DF7CB678');
        $this->addSql('DROP INDEX IDX_ED67C1E6DF7CB678 ON previous_medical_operation');
        $this->addSql('ALTER TABLE previous_medical_operation DROP medical_files_id, CHANGE medical_operation_type medical_operation_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE operation_date operation_date DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE tourisme_region CHANGE medical_city_id medical_city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE spec_id spec_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
