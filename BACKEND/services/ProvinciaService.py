from db import  connection
from flask import jsonify,abort
class ProvinciaService():

    def get_all_provincias(self):
        try:
            query = """SELECT p.id, p.nome from provincia p;"""
            cursor = connection.cursor()
            cursor.execute(query)
            provincias = cursor.fetchall()
            connection.commit()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if provincias is None:
            abort(404)
        return jsonify({"data": provincias})

    def post_provincia(self,provincia):
        try:
            query = """INSERT INTO provincia (nome) VALUES (%s);"""
            cursor = connection.cursor()
            cursor.execute(query,(provincia["nome"]))
            connection.commit()
            cursor.close()
            id_provincia = cursor.lastrowid
        except Exception as ex:
            print(str(ex))
            return jsonify({"message": str(ex)})
        return jsonify({"data":{"id":id_provincia,"success":True} })
    
    