from flask_smorest import Blueprint
from flask.views import MethodView
from flask import request
from services import DepartamentoService
blp = Blueprint("departamentos",__name__, description="Operacoes sobre o departamento")

@blp.route("/departamento")
class DepartamentoController(MethodView):
    def get(self):
        return DepartamentoService.get_all_departamentos(self)

    def post(self):
        return DepartamentoService.post_departamento(self,departamento=request.get_json())