from flask_smorest import Blueprint
from flask.views import MethodView
from flask import request
from services import PresencaFuncionarioService
blp = Blueprint("presenca_funcionario",__name__, description="Operacoes sobre a presenca")

@blp.route("/presenca")
class PresencaFuncionarioController(MethodView):
    def post(self):
        return PresencaFuncionarioService.post_presencas(self, presenca=request.get_json())
    
    #def get(self):
        #return PresencaFuncionarioService.get_verificar_presenca(self,filtros=request.get_json())

 
    def put(self):
        return PresencaFuncionarioService.update_saida(self,presenca=request.get_json())
    

@blp.route("/presencas/<int:id_funcionario>")
class PresencaControllerById(MethodView):
    def get(self, id_funcionario):
        return PresencaFuncionarioService.get_one_presencas(self, id_funcionario)
    

@blp.route("/presencas")
class PresencaFuncionarioController(MethodView):
    def get(self):
        return PresencaFuncionarioService.get_all_funcionarios_presenca(self,filtros=request.get_json()) 
    

# @blp.route("/presencas")
# class PresencaFuncionarioController(MethodView):
#     def post(self):
#         return PresencaFuncionarioService.post_createSaida(self, presenca=request.get_json())