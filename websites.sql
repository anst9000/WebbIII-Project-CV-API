CREATE TABLE webiii_websites (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO
  webiii_websites (title, url, description)
VALUES
  (
    'Murbergskolan',
    'www.murbergsskolan.se',
    'Hel website för skolan.'
  ),
  (
    'Franzenskolan',
    'www.franzenskolan.se',
    'Delar av website för hela skolan.'
  ),
  (
    'Härnösands gymnasium',
    'www.harnosand.se/gymnasium',
    'Ingångssidan för gymnasiet i Härnösand.'
  ),
  (
    'Kungliga Tekniska Högskolan',
    'www.kth.se',
    'Hela KTH:s websidor, internt och externt.'
  );