from db import  connection
from flask import jsonify,abort
from datetime import date
class PresencaFuncionarioService():
   

# colocar a presenca de um funcionario
   def post_presencas(self, presenca):
       try:
            today = date.today()
            query = f"""SELECT p.id_funcionario as id_funcionario
                from presenca p
                INNER JOIN funcionario f ON p.id_funcionario=f.id
                WHERE p.data = '{today}' AND
                p.id_funcionario={presenca["id_funcionario"]};"""
            cursor = connection.cursor()
            cursor.execute(query)
            funcionario = cursor.fetchone()                   
            connection.commit()

            if funcionario is None:

                query = """INSERT INTO presenca (id_funcionario)
                    VALUES (%s)"""
                # cursor = connection.cursor()
                cursor.execute(query,(presenca["id_funcionario"] ))
                connection.commit()
                cursor.close()
                id_presenca = cursor.lastrowid

                return jsonify({"data":{"id":id_presenca}, "message": "Presenca marcada com sucesso!","success":True })
            else:
                return jsonify({"data":{},"message": "Esta presenca ja foi marcada anteriormente!","success":False })
       except Exception as ex:
           print(str(ex))
           return jsonify({"message": str(ex)})
               
   def update_saida(self, presenca):
        try:
                today = date.today()

            #    if PresencaService.get_presenca(presenca["id_funcionario"], presenca["tipo_presenca"]):

                query = f"""SELECT p.id_funcionario as id_funcionario, p.hora_chegada, p.hora_saida
                    from presenca p 
                    INNER JOIN funcionario f ON p.id_funcionario=f.id
                    WHERE p.data = '{today}' AND p.id_funcionario={presenca["id_funcionario"]};"""
                print(query)
                cursor = connection.cursor()
                cursor.execute(query)
                funcionario = cursor.fetchone()                   
                connection.commit()

                if funcionario["hora_saida"] is None:

                    query = """UPDATE presenca set hora_saida = CURRENT_TIMESTAMP where id_funcionario = %s AND data=CURDATE();"""
                    # cursor = connection.cursor()
                    cursor.execute(query,(presenca["id_funcionario"]))
                    connection.commit()
                    cursor.close()
                    id_presenca = cursor.lastrowid

                    return jsonify({"data":{"id":id_presenca}, "message": "Saida marcada com sucesso!","success":True })
                else:
                    return jsonify({"data":{},"message": "Esta Saida ja foi marcada anteriormente!","success":False })
        except Exception as ex:
            print(str(ex))
            return jsonify({"message": str(ex)})
   

   def get_one_presencas(self,id_funcionario):
        try:
            query = f"""SELECT p.id, f.nome, p.data, date_format(p.hora_chegada, "%H:%i:%s") hora_chegada,
                            date_format(p.hora_saida, "%H:%i:%s") hora_saida
                    FROM presenca p
                    INNER JOIN funcionario f ON p.id_funcionario = f.id
                    where f.id = {id_funcionario} """
            cursor = connection.cursor()
            cursor.execute(query)
            presencas = cursor.fetchall()
            connection.commit()
            cursor.close()
        except Exception as ex:
            return jsonify({"message":str(ex)})
        if presencas is None:
            abort(404)
        return jsonify({"data": presencas})


   def get_all_funcionarios_presenca(self, filtros):
        sql_filtros = " 1=1 "
        today = date.today()
        #print(filtros['data'])
        try:
            if "nome" in filtros:
                if filtros["nome"] != "":
                    sql_filtros+= f"""and f.nome like '%{filtros["nome"]}%' """

            if "hora_chegada" in filtros:
                if filtros["hora_chegada"] != "":
                    sql_filtros+= f"""and date_format(pr.hora_chegada,"%H:%i:%s")hora_chegada like '%{filtros["hora_chegada "]}%' """
            
            # if "data" in filtros:
            #     if filtros["data"] != "":
            #         #sql_filtros+= f"""and date_format(pr.data,"%d:%m:%Y")data like '%{filtros["data "]}%' """
            #         sql_filtros += f"""and date_format(pr.data, "%Y:%i:%d") LIKE '%{filtros["data"]}%' """

            
            if "departamento" in filtros:
                if filtros["departamento"] != "":
                    sql_filtros+= f"""and f.id_departamento = '{filtros["departamento"]}' """

            query = f"""SELECT distinct f.id, f.nome , f.genero as genero, f.data_nascimento, 
            p.nome as provincia, d.nome as distrito, dp.nome as departamento, f.contacto,
            (SELECT date_format(pr.hora_chegada,"%H:%i:%s") hora_chegada FROM presenca 
            pr WHERE pr.id_funcionario=f.id AND pr.data=CURDATE()) as hora_chegada, 
            (SELECT pr.presente FROM presenca pr WHERE pr.id_funcionario=f.id AND pr.data=CURDATE()) as presenca,
            (SELECT date_format(pr.hora_saida,"%H:%i:%s") hora_saida FROM presenca 
            pr WHERE pr.id_funcionario=f.id AND pr.data=CURDATE()) as hora_saida
                    FROM funcionario f
                    INNER JOIN provincia p on p.id = f.id_provincia
                    INNER JOIN distrito d on d.id = f.id_distrito
                    INNER JOIN departamento dp on dp.id = f.id_departamento
                    WHERE  
                     {sql_filtros}"""
                     
            # print(query)
            cursor = connection.cursor()
            cursor.execute(query)
            funcionarios = cursor.fetchall()
            array_funcionarios = []
            for funcionario in funcionarios:
             array_funcionarios.append(funcionario)
            cursor.close()
        except Exception as ex:
            return jsonify({"message": str(ex)})
        if funcionarios is None:
            abort(404)
        return jsonify(array_funcionarios)




# Função para verificar a presença de um funcionário
"""
   def get_verificar_presenca(funcionario):
            current_datetime = date.datetime.now()
            
            hora_limite = date.time(hour=12, minute=0) 

            query = "SELECT hora_chegada FROM presenca WHERE id_funcionario = %s AND data = CURDATE() ORDER BY hora_chegada DESC LIMIT 1"
            cursor = connection.cursor()
            cursor.execute(query)
            funcionario = cursor.fetchone()

            hora_chegada = date.now().time()
            hora_limite = funcionario.hora_limite

            if funcionario is not None:
                 hora_chegada = funcionario.time()
                 if hora_chegada <= hora_limite :
                    print("O funcionário esteve presente.")
                 else:
                            print("O funcionário esteve ausente.")
            else:
              print("O funcionário esteve ausente.")


            cursor.close()
            return jsonify({"message": str})
"""