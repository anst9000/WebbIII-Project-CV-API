CREATE TABLE webiii_educations (
  id INT(11) NOT NULL AUTO_INCREMENT,
  school VARCHAR(255) NOT NULL,
  course VARCHAR(255) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO
  webiii_educations (school, course, start_date, end_date)
VALUES
  (
    'Murbergskolan',
    'Grundskolan',
    '2001-01-01',
    '2001-01-01'
  ),
  (
    'Franzenskolan',
    'Högstadiet',
    '2001-01-01',
    '2001-01-01'
  ),
  (
    'Härnösands gymnasium',
    'Gymnasiet',
    '2001-01-01',
    '2001-01-01'
  ),
  (
    'Kungliga Tekniska Högskolan',
    'Arbetsmiljöingenjör',
    '2001-01-01',
    '2001-01-01'
  ),
  (
    'Ålsta folkhögsskola',
    'Lärare',
    '2001-01-01',
    '2001-01-01'
  );