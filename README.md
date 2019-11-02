# **WebbIII-Project-CV-API**
-------

## Description
> This is the REST API which both WebbIII-Project-CV-Admin and WebbIII-Project-CV-Application is getting data from. This REST API has full CRUD functionality, which means that it is possible to Create, Read, Update and Delete posts in this API.

## Site
> The Internet address to the API is  [https://anst9000.xyz/api](https://anst9000.xyz/api) after that you will have to specify what type of information you want to see.
- /education
- /job
- /website

## Usage
> Say for example that you are interrested in getting all education posts from the API, then you can either via the browser or the software **Postman** type https://anst9000.xyz/api/education/read.php and you will receive a JSON-object with a list of records.
```json
{
  "records": [
    {
      "id": "1",
      "school": "Murbergskolan",
      "course": "Grundskolan",
      "start_date": "2001-01-01",
      "end_date": "2001-01-01"
    },
    {
      "id": "2",
      "school": "Franzenskolan",
      "course": "Högstadiet",
      "start_date": "2001-01-01",
      "end_date": "2001-01-01"
    }
  ]
}
```

## Databases
There are three different tables in the database and they are created as follows:
```sql
CREATE TABLE webiii_educations (
  id INT(11) NOT NULL AUTO_INCREMENT,
  school VARCHAR(255) NOT NULL,
  course VARCHAR(255) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE webiii_jobs (
  id INT(11) NOT NULL AUTO_INCREMENT,
  company VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE webiii_websites (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  PRIMARY KEY (id)
);
```

