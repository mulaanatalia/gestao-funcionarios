from db import  connection
from flask import jsonify, request,abort
class DistritoService():

    def get_distritos_by_provincia(self,id):
        try:
            query = """SELECT d.id, d.nome from distrito d where id_provincia =%s;"""
            cursor = connection.cursor()
            cursor.execute(query,(id))
            distritos = cursor.fetchall()
            cursor.close()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if distritos is None:
            abort(404)
        return jsonify({"data": distritos})
    
    def get_all_distritos(self):
        try:
            query = """SELECT d.id, d.nome from distrito d;"""
            cursor = connection.cursor()
            cursor.execute(query)
            distritos = cursor.fetchall()
            cursor.close()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if distritos is None:
            abort(404)
        return jsonify({"data": distritos})

    def post_distrito(self,distrito):
        try:
            query = """INSERT INTO distrito (nome, id_provincia) VALUES (%s,%s);"""
            cursor = connection.cursor()
            cursor.execute(query,(distrito["nome"],distrito["id_provincia"]))
            connection.commit()
            cursor.close()
            id_distrito = cursor.lastrowid
        except Exception as ex:
            print(str(ex))
            return jsonify({"message": str(ex)})
        return jsonify({"data":{"id":id_distrito,"success":True} })