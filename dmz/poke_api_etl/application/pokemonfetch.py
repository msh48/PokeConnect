import math
import requests


class FetchPokemonData:

    def __init__(self):
        self.jira_endpoint = https://pokeapi.co/api/v2/generation/8/
        self.num_issues = self.get_total_number_of_issues()

    def get_total_number_of_pokemon_games(self):
        """Gets the total number of results to retrieve."""
        params = {
            "jql": self.jira_jql,
            "maxResults": 0,
            "startAt": 0}
        req = requests.get(self.jira_endpoint,
                           headers={"Accept": "application/json"},
                           params=params,
                           auth=(self.jira_username, self.jira_password))
        return req.json()['total']

    def fetch_all_results(self):
        """Retrieve all JIRA issues."""
        issue_arr = []

        def fetch_single_page(total_results):
            """Fetch one page of results, determine if more pages exist."""
            params = {
                "jql": self.jira_jql,
                "maxResults": self.results_per_page,
                "startAt": len(issue_arr)}
            req = requests.get(self.jira_endpoint,
                               headers={"Accept": "application/json"},
                               params=params,
                               auth=(self.jira_username, self.jira_password))
            response = req.json()
            issues = response['issues']
            issues_so_far = len(issue_arr) + self.results_per_page
            if issues_so_far > self.num_issues:
                issues_so_far = self.num_issues
            print(f'Fetched {issues_so_far} out of {self.num_issues} total issues.')
            issue_arr.extend(issues)
            # Check if additional pages of results exist.
        count = math.ceil(self.num_issues/self.results_per_page)
        for x in range(0, count):
            fetch_single_page(self.num_issues)
        return issue_arr