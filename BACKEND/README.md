# Gestao de Funcionarios API
## Getting Started 

### Installing Dependencies

#### Python 3.7
Follow instructions to install the latest version of python for your platform in the [python docs](https://docs.python.org/3/using/unix.html#getting-and-installing-the-latest-version-of-python)
#### Import MYSQL DataBase
On the root folder the project you will find the database 'www.funcionarios.co.mz.sql'
#### Virtual Enviornment

We recommend working within a virtual environment whenever using Python for projects. This keeps your dependencies for each project separate and organaized. Instructions for setting up a virual enviornment for your platform can be found in the python docs

#### PIP Dependencies

Once you have your virtual environment setup and running, install dependencies by running:

```bash
pip install -r requirements.txt
```

This will install all of the required packages we selected within the `requirements.txt` file.

##### Key Dependencies

- [Flask](http://flask.pocoo.org/)  is a lightweight backend microservices framework. Flask is required to handle requests and responses.

- [SQLAlchemy](https://www.sqlalchemy.org/) is the Python SQL toolkit and ORM we'll use handle the lightweight sqlite database. You'll primarily work in app.py and can reference models.py.
- [Flask-smorest](https://flask-smorest.readthedocs.io/en/latest/quickstart.html) Makes a few assumptions about how the code should be structured.

## Running the server

From within the  directory first ensure you are working using your created virtual environment.

To run the server, execute:

```bash
python app.py
or 
flask --app app.py --debug run
```
# End-points
| Endpoint   |  Methods |    Rule |
| --- | --- | --- |
| departamentos.DepartamentoController |  GET, POST  | /departamento |               
| distritos.DistritosController      |   GET       | /distritos/<int:id_provincia> |
| distritos.DistroPostController     |   POST      | /distrito                     |
| funcionarios.FuncionarioController |   GET, POST | /funcionario                  |
| provincias.ProvinciaController     |   GET, POST | /provincia                    |



## POST 'http://127.0.0.1:5000/departamento'
- Create a new Department.
- Resquet Arguments: 
```bash
{
  "nome":"Informatica"
}
```
- Returns:  success and a department id.
```bash
 {
    "success": true,
    "id": 1
 }
```

## POST 'http://127.0.0.1:5000/distrito'
- Create a new Distrito.
- Resquet Arguments: 
```bash
{"nome":"Zavala",
"id_provincia":"3"}
```
- Returns: a success value and a Distrito id 


## POST 'http://127.0.0.1:5000/provincia'
- Creates a Province.
- Request Arguments: 
```bash
{
  "nome":"Maputo"
}
```
- Returns: a success value and a province id

## POST 'http://127.0.0.1:5000/funcionario '
- Creates a Funcionario
- Request Arguments: 
```bash
{
    "nome":"Filzarda Marco",
    "genero":"F",
    "data_nascimento":"1990-10-10",
    "contacto":847422831,
    "id_provincia":1,
    "id_distrito":1,
    "id_departamento":1
}
```
- Returns: a json with success value and Funcionario id



## GET 'http://127.0.0.1:5000/departamento'
- Fetches  a dictionary of departments 
- Request Arguments: -
- Returns:  a list of deparments 
```bash
{
    "data": [
        {
            "id": 1,
            "nome": "Marketing"
        },
        {
            "id": 3,
            "nome": "Informatica"
        }
    ]
}
```

## GET 'http://127.0.0.1:5000/provincia'
- Fetches  a dictionary of provinces 
- Request Arguments: -
- Returns:  a list of provinces 
```bash
{
    "data": [
        {
            "id": 1,
            "nome": "Maputo"
        },
        {
            "id": 2,
            "nome": "Gaza"
        },
        {
            "id": 3,
            "nome": "Inhambane"
        }
    ]
}
```

## GET 'http://127.0.0.1:5000/distritos/1'
- Fetches  a dictionary of Distritos by id of the province 
- Request Arguments: -
- Returns: a success value and a list of Distritos
```bash
{
    "data": [
        {
            "id": 1,
            "nome": "Boane"
        }
    ]
}
```


## GET 'http://127.0.0.1:5000/funcionario'
- Fetches  a dictionary of Funcionarios with the ability to filter
- Request Arguments: json of nome, genero, id_distrito, id_provincia
```bash
{
    "genero":"",
    "nome": "",
    "id_provincia":"",
    "id_distrito":""
}
```
- Returns:  a list of Funcionarios 
```bash
{
    "data": [
        {
            "contacto": "847455645",
            "data_nascimento": "Tue, 09 Jun 1998 00:00:00 GMT",
            "departamento": "Marketing",
            "distrito": "Boane",
            "genero": "M",
            "nome": "Aldeir",
            "provincia": "Maputo"
        },
    ]
}
```
### Todo
- 

