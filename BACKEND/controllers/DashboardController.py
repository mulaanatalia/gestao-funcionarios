from flask_smorest import Blueprint
from flask.views import MethodView
from flask import request
from services import DashboardService
blp = Blueprint("totais",__name__, description="Operacoes sobre os totais")


@blp.route("/dashboard_totais")
class DashboardController(MethodView):
    def get(self):
        return DashboardService.get_all_totais(self)
    
@blp.route("/dashboard_genero")
class DashboardController(MethodView):
    def get(self):
        return DashboardService.get_all_genero(self)

@blp.route("/dashboard_departamento")
class DashboardController(MethodView):
    def get(self):
        return DashboardService.get_all_departamento(self)

# @blp.route("/dashboard_data")
# class DashboardController(MethodView):
#     def get(self):
#         return DashboardService.get_all_data_criacao(self)
