from flask_smorest import Blueprint
from flask.views import MethodView
from flask import request
from services import DistritoService
blp = Blueprint("distritos",__name__, description="Operacoes sobre o distrito")

@blp.route("/distritos/<int:id_provincia>")
class DistritosController(MethodView):
    def get(self,id_provincia):
        return DistritoService.get_distritos_by_provincia(self,id_provincia)


@blp.route("/distrito")
class DistroPostController(MethodView):
    def post(self):
        return DistritoService.post_distrito(self,distrito=request.get_json())
    def get(self):
        return DistritoService.get_all_distritos(self)
