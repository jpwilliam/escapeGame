import random

def jouer_pendu(total_mots_a_trouver):
    choix = ["pirate", "ordinateur", "configuration", "souris", "hackeur", "cybersecurite", "antivirus", "parefeu", "cryptographie", "exploitation"]
    solution = random.choice(choix)
    tentatives = 7
    affichage = ""
    lettres_trouvees = ""
    flag = "Adminstrateur"

    for l in solution:
        affichage = affichage + "_ "

    print(">> Bienvenue dans le pendu <<")

    while tentatives > 0:
        print("\nMot à deviner : ", affichage)
        proposition = input("Proposez une lettre : ")[0:1].lower()

        if proposition in solution:
            lettres_trouvees = lettres_trouvees + proposition
            print("-> Bien vu!")
        else:
            tentatives = tentatives - 1
            print("-> Raté gros noob\n")
            if tentatives == 0:
                print(" ==========Y= ")
            if tentatives <= 1:
                print(" ||/       |  ")
            if tentatives <= 2:
                print(" ||        0  ")
            if tentatives <= 3:
                print(" ||       /|\ ")
            if tentatives <= 4:
                print(" ||       / \ ")
            if tentatives <= 5:
                print("/||           ")
            if tentatives <= 6:
                print("==============\n")

        affichage = ""
        for x in solution:
            if x in lettres_trouvees:
                affichage += x + " "
            else:
                affichage += "_ "

        if "_" not in affichage:
            mots_restants = total_mots_a_trouver - mots_trouves - 1
            print(f">>> Gagné! <<< Il vous reste {mots_restants} mot(s) à trouver.")
            return True

    print("\n    * Fin de la partie *    ")
    return False

# Nombre total de mots à trouver
total_mots_a_trouver = 3

# Boucle jusqu'à ce que le joueur ait trouvé le nombre total de mots
mots_trouves = 0
while mots_trouves < total_mots_a_trouver:
    if jouer_pendu(total_mots_a_trouver):
        mots_trouves += 1

print("Vous avez trouvé tous les mots. Félicitations! Le Flag est Administrateur.")
