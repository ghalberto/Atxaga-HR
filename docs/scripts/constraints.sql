-- Contract

ALTER TABLE contract
    ADD CONSTRAINT FK_contract_person
    FOREIGN KEY (person_id) REFERENCES person (id);

ALTER TABLE contract
    ADD CONSTRAINT FK_contract_position
    FOREIGN KEY (position_id) REFERENCES position (id);

-- Person

ALTER TABLE person
    ADD CONSTRAINT FK_person_country
    FOREIGN KEY (country_id) REFERENCES country (id);