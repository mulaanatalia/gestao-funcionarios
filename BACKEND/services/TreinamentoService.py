from db import  connection
from flask import jsonify,abort
class TreinamentoService():

    def get_all_treinamentos(self):
        try:
            query = """SELECT t.id, t.nome, t.descricao, t.duracao from treinamento t;"""
            cursor = connection.cursor()
            cursor.execute(query)
            treinamentos = cursor.fetchall()
            cursor.close()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if treinamentos is None:
            abort(404)
        return jsonify({"data": treinamentos})

    
    
    def post_treinamento(self, treinamento):
        try:
            query = """INSERT INTO treinamento
                    (nome, descricao, duracao)
                    VALUES (%s, %s, %s);"""
            cursor = connection.cursor()
            cursor.execute(query, (treinamento["nome"], treinamento["descricao"], treinamento["duracao"]))
            id_treinamento = cursor.lastrowid
            connection.commit()
            cursor.close()
        except Exception as ex:
            print(str(ex))
            return jsonify({"message": str(ex)})
        return jsonify({"success": True, "id": id_treinamento, "message": "Treinamento registrado com sucesso"}), 200

    
    # def get_one_funcionarios(self, id):
    #     try:
    #         query = """SELECT f.id, f.nome , f.genero as genero, f.data_nascimento, 
    #         p.nome as provincia, d.nome as distrito, dp.nome as departamento, f.contacto
    #                 FROM funcionario f
    #                 INNER JOIN provincia p on p.id = f.id_provincia
    #                 INNER JOIN distrito d on d.id = f.id_distrito
    #                 INNER JOIN departamento dp on dp.id = f.id_departamento where f.id=%s"""
    #         cursor = connection.cursor()
    #         cursor.execute(query, id)
    #         funcionarios = cursor.fetchall()
    #         cursor.close()
    #     except Exception as ex:
    #         return jsonify({"message":ex})
    #     if funcionarios is None:
    #         abort(404)
    #     return jsonify({"data":funcionarios[0]})
    
    # def put_funcionario(self, funcionario, id):
        
    #     try:
    #         query = """UPDATE funcionario SET nome = %s, genero = %s, data_nascimento = %s, 
    #         contacto = %s, id_provincia = %s, id_distrito = %s, id_departamento = %s 
    #         WHERE funcionario.id = %s"""
    #         cursor = connection.cursor()
    #         cursor.execute(query, (funcionario["nome"],
    #                               funcionario["genero"],
    #                               funcionario["data_nascimento"],
    #                               funcionario["contacto"],
    #                               funcionario["id_provincia"],
    #                               funcionario["id_distrito"],
    #                               funcionario["id_departamento"], id))
    #         connection.commit()
    #         cursor.close()
          
    #     except Exception as ex:
    #         print(str(ex))
    #         return jsonify({"message": str(ex)})
    #     return jsonify({"success":True, "message":"Funcionario actualizado com sucesso"}), 201
    

    # def desativar_funcionario(self, id):
    #         try:
    #             cursor = connection.cursor()
    #             query = "UPDATE funcionario SET estado = false WHERE id = %s"
    #             cursor.execute(query, (id,))
    #             connection.commit()
    #             cursor.close()
    #         except Exception as ex:
    #             return jsonify({"message": str(ex)})
    #         return jsonify({"message": "Funcionário desativado com sucesso."})    
    
