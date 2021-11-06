import requests
import json

class FetchPokemonData:

    def __init__(self):
        self.pokemon_generation_endpoint = 'https://pokeapi.co/api/v2/generation'
        self.pokemon_move_endpoint = 'https://pokeapi.co/api/v2/move'
        self.pokemon_item_endpoint = 'https://pokeapi.co/api/v2/item'
        self.pokemon_endpoint = 'https://pokeapi.co/api/v2/pokemon'

    def get_total_number_of_pokemon_generation(self, id):
        """Gets the total number of pokemon for generation.
            id: generation number"""
        new_pokemon_endpoint = "{}/{}".format(self.pokemon_generation_endpoint, id)
        req = requests.get( new_pokemon_endpoint,
                           headers={"Accept": "application/json"})
        return req.json()

    def get_pokemon_stats(self, pokemon_name):
        new_pokemon_endpoint = "{}/{}".format(self.pokemon_endpoint, pokemon_name)
        req = requests.get( new_pokemon_endpoint,
                           headers={"Accept": "application/json"})
        if req.status_code == 404:
            errorDic = {'error': 'Did Not Find Stats'}
            return errorDic
        return req.json()

    def get_total_number_of_pokemon_items(self, items_category_id):
        """Gets the total number of pokemon items per category
            items_category_id: items category number"""
        new_pokemon_endpoint = "{}/{}".format(self.pokemon_item_endpoint, items_category_id)
        req = requests.get( new_pokemon_endpoint,
                           headers={"Accept": "application/json"})
        return req.json()

    def get_total_number_of_pokemon_moves(self, moves_category_id):
        """"Gets the total number of pokemon moves per category
            moves_category_id: moves category number"""
        new_pokemon_endpoint = "{}/{}".format(self.pokemon_move_endpoint, moves_category_id)
        req = requests.get( new_pokemon_endpoint,
                           headers={"Accept": "application/json"})
        return req.json()

