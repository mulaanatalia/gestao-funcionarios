from db import  connection
from flask import jsonify,abort
class EscalaPontuacaoService():

    def get_all_escalas_pontuacao(self):
        try:
            query = """SELECT * from escala_pontuacao;"""
            cursor = connection.cursor()
            cursor.execute(query)
            escala_pontuacao = cursor.fetchall()
            connection.commit()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if provincias is None:
            abort(404)
        return jsonify({"data": provincias})

   