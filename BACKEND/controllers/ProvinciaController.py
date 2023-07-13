from flask_smorest import Blueprint
from flask.views import MethodView
from flask import request
from services import ProvinciaService
blp = Blueprint("provincias",__name__, description="Operacoes sobre o provincia")

@blp.route("/provincia")
class ProvinciaController(MethodView):
    def get(self):
        return ProvinciaService.get_all_provincias(self)

    def post(self):
        return ProvinciaService.post_provincia(self,provincia=request.get_json())
