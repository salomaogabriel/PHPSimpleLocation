//this function will fetch data from the php file and then add it to the select tag in the HTML.
function populateCountries() {
    //the select tag
    const countrySelect =  document.querySelector('select[name=country]')
    //fetchs the data from the php .
    fetch('countries.php')
    //creates a json from the file .
      .then( res => res.json())
      //adds the data to the select tag.
      .then( countries => {
          for (const country of countries) {
              countrySelect.innerHTML += `<option value="${country.name}">${country.name}</option>`
          }
      })
}
//calls the function when the page loads.
populateCountries()

// get the states from the requested country.
function getStates(event) {
    // the select tag where the data will be added to.
    const stateSelect = document.getElementById("state-select")

    // country selected.
    const country = event.target.value


//the url that will be fetched from.
    const url = `subdiv.php?state=${country}`
    
//function that will fetch the states.
    async function fetchStates(url) {
        // fetch the data from the url 
        const response = await fetch(url)
        //creates a json from the fetchet data
        let states = await response.json()

        //for each state in the list of states, add a option in the state select tag.
        for (const state of states) {
            stateSelect.innerHTML += `<option value="${state.name}">${state.name}</option>`
        }

 
    }

    fetchStates(url)
  
  
}
// add an event listener for every change in the country select tag.
document
.querySelector('select[name=country]')
.addEventListener('change', getStates)

