from flask import  Flask
from flask_smorest import Api
from controllers import blpFuncionario, blpProvincia, blpDistrito, blpDepartamento, blpPresencaFuncionario, blpDashboard, blpTreinamento
def create_app(test_config=None):
    app = Flask(__name__)
    app.secret_key = 'programadeestagioits'
    app.config["API_TITLE"] = "Funcionarios API"
    app.config["API_VERSION"] = "v1"
    app.config["OPENAPI_VERSION"] = "3.0.2"
    api = Api(app)
    api.register_blueprint(blpFuncionario)
    api.register_blueprint(blpProvincia)
    api.register_blueprint(blpDistrito)
    api.register_blueprint(blpDepartamento)
    api.register_blueprint(blpPresencaFuncionario)
    api.register_blueprint(blpDashboard)
    api.register_blueprint(blpTreinamento)

    return app

if __name__ == '__main__':
    api = create_app()
    api.run(debug=True)

