CREATE TABLE webiii_jobs (
  id INT(11) NOT NULL AUTO_INCREMENT,
  company VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO
  webiii_jobs (company, title, start_date, end_date)
VALUES
  (
    'Murbergskolan',
    'Lärare',
    '2001-01-01',
    '2001-01-01'
  ),
  (
    'Landgrenshallen',
    'Vaktmästare',
    '2001-01-01',
    '2001-01-01'
  ),
  (
    'Vägverket',
    'Ingenjör',
    '2001-01-01',
    '2001-01-01'
  ),
  (
    'NCC',
    'Civilingenjör, Väg och vatten',
    '2001-01-01',
    '2001-01-01'
  ),
  (
    'Mittuniversitetet',
    'Datateknik',
    '2001-01-01',
    '2001-01-01'
  );