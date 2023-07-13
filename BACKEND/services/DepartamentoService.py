from db import  connection
from flask import jsonify,abort
class DepartamentoService():

    def get_all_departamentos(self):
        try:
            query = """SELECT d.id, d.nome from departamento d;"""
            cursor = connection.cursor()
            cursor.execute(query)
            departamentos = cursor.fetchall()
            cursor.close()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if departamentos is None:
            abort(404)
        return jsonify({"data": departamentos})

    def post_departamento(self,departamento):
        try:
            query = """INSERT INTO departamento (nome) VALUES (%s);"""
            cursor = connection.cursor()
            cursor.execute(query,(departamento["nome"]))
            connection.commit()
            cursor.close()
            id_departamento = cursor.lastrowid
        except Exception as ex:
            print(str(ex))
            return jsonify({"message": str(ex)})
        return jsonify({"data":{"id":id_departamento,"success":True} })