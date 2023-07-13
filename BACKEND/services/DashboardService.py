from db import  connection
from flask import jsonify,abort

class DashboardService():

    def get_all_totais(self):
        try:
            query = """SELECT COUNT(*) AS total, SUM(IF(estado=1,1,0)) total_activos,SUM(IF(estado=0,1,0)) total_inativos FROM funcionario"""
            cursor = connection.cursor()
            cursor.execute(query)
            totais = cursor.fetchone()
            cursor.close()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if totais is None:
            abort(404)
        return jsonify(totais)
    
    def get_all_genero(self):
        total_masculino = {}
        total_femenino = {}
        data = []
        try:
            query = """SELECT COUNT(*)as total, genero FROM `funcionario` GROUP BY genero"""
            cursor = connection.cursor()
            cursor.execute(query)
            totais = cursor.fetchall()
            # print
            cursor.close()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if totais is None:
            abort(404)
        for row in totais:
            if row["genero"] == "M":
                total_masculino["name"]="Masculino"
                total_masculino["value"]=row["total"]
            else:
                total_femenino["name"] ="Feminino"
                total_femenino["value"]=row["total"]
        data.append(total_masculino)
        data.append(total_femenino)
        return jsonify(data)
    
    def get_all_departamento(self):

        descricao = []
        total = []
        data = []

        try:
            query = """SELECT COUNT(*)as total, departamento.nome FROM `funcionario` INNER JOIN departamento ON funcionario.id_departamento=departamento.id GROUP BY id_departamento"""
            cursor = connection.cursor()
            cursor.execute(query)
            totais = cursor.fetchall()
            # print
            cursor.close()
        except Exception as ex:
            return jsonify({"message":str(ex),"code":500})
        if totais is None:
            abort(404)
        print(totais)
        for row in totais:
            descricao.append(row['nome'])
            total.append(row['total'])
        return jsonify({"departamento":descricao, "total":total})

    # def get_all_data_criacao(self):
    #     data = []
    #     total = []
    #     try:
    #         query = """SELECT COUNT(*) as total,DATE_FORMAT(data_criacao,"%d-%m-%Y") AS data FROM `funcionario` GROUP BY DATE(data_criacao)"""
    #         cursor = connection.cursor()
    #         cursor.execute(query)
    #         totais = cursor.fetchall()
    #         cursor.close()
    #     except Exception as ex:
    #         return jsonify({"message":str(ex),"code":500})
    #     if totais is None:
    #         abort(404)
    #     print(totais)
    #     for row in totais:
    #         data.append(row['data'])
    #         total.append(row['total'])
    #     return jsonify({"data": data,"total":total})
