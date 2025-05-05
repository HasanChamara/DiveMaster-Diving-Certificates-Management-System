
// B2C Table

document.addEventListener("DOMContentLoaded", function() {
    var rowsPerPage = 8;
    var rows = document.querySelectorAll("#trDataTable tbody tr");
    var totalPages = Math.ceil(rows.length / rowsPerPage);
    var currentPage = 1;

    function showPage(page) {
        rows.forEach((row, index) => {
            row.style.display = (index >= (page - 1) * rowsPerPage && index < page * rowsPerPage) ? "" : "none";
        });
        updatePagination(page);
    }

    function updatePagination(page) {
        var paginationNumbers = document.querySelector(".trp-page-numbers.b2c");
        paginationNumbers.innerHTML = "";

        for (var i = 1; i <= totalPages; i++) {
            var pageItem = document.createElement("li");
            pageItem.className = `page-item ${i === page ? "active" : ""}`;
            var pageLink = document.createElement("a");
            pageLink.className = "page-link";
            pageLink.href = "#";
            pageLink.textContent = i;
            pageLink.addEventListener("click", function(e) {
                e.preventDefault();
                currentPage = parseInt(this.textContent);
                showPage(currentPage);
            });
            pageItem.appendChild(pageLink);
            paginationNumbers.appendChild(pageItem);
        }

        document.getElementById("prev").parentElement.classList.toggle("disabled", page === 1);
        document.getElementById("next").parentElement.classList.toggle("disabled", page === totalPages);
    }

    document.getElementById("prev").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById("next").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);
});


// B2B Table

document.addEventListener("DOMContentLoaded", function() {
    var rowsPerPage = 8;
    var rows = document.querySelectorAll("#trDataTableB2B tbody tr");
    var totalPages = Math.ceil(rows.length / rowsPerPage);
    var currentPage = 1;

    function showPage(page) {
        rows.forEach((row, index) => {
            row.style.display = (index >= (page - 1) * rowsPerPage && index < page * rowsPerPage) ? "" : "none";
        });
        updatePagination(page);
    }

    function updatePagination(page) {
        var paginationNumbers = document.querySelector(".trp-page-numbers.b2b");
        paginationNumbers.innerHTML = "";

        for (var i = 1; i <= totalPages; i++) {
            var pageItem = document.createElement("li");
            pageItem.className = `page-item ${i === page ? "active" : ""}`;
            var pageLink = document.createElement("a");
            pageLink.className = "page-link";
            pageLink.href = "#";
            pageLink.textContent = i;
            pageLink.addEventListener("click", function(e) {
                e.preventDefault();
                currentPage = parseInt(this.textContent);
                showPage(currentPage);
            });
            pageItem.appendChild(pageLink);
            paginationNumbers.appendChild(pageItem);
        }

        document.getElementById("prev").parentElement.classList.toggle("disabled", page === 1);
        document.getElementById("next").parentElement.classList.toggle("disabled", page === totalPages);
    }

    document.getElementById("prev").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById("next").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);
});



// Supplier Table

document.addEventListener("DOMContentLoaded", function() {
    var rowsPerPage = 8;
    var rows = document.querySelectorAll("#trDataTableSupplier tbody tr");
    var totalPages = Math.ceil(rows.length / rowsPerPage);
    var currentPage = 1;

    function showPage(page) {
        rows.forEach((row, index) => {
            row.style.display = (index >= (page - 1) * rowsPerPage && index < page * rowsPerPage) ? "" : "none";
        });
        updatePagination(page);
    }

    function updatePagination(page) {
        var paginationNumbers = document.querySelector(".trp-page-numbers.supplier");
        paginationNumbers.innerHTML = "";

        for (var i = 1; i <= totalPages; i++) {
            var pageItem = document.createElement("li");
            pageItem.className = `page-item ${i === page ? "active" : ""}`;
            var pageLink = document.createElement("a");
            pageLink.className = "page-link";
            pageLink.href = "#";
            pageLink.textContent = i;
            pageLink.addEventListener("click", function(e) {
                e.preventDefault();
                currentPage = parseInt(this.textContent);
                showPage(currentPage);
            });
            pageItem.appendChild(pageLink);
            paginationNumbers.appendChild(pageItem);
        }

        document.getElementById("prevSupplier").parentElement.classList.toggle("disabled", page === 1);
        document.getElementById("nextSupplier").parentElement.classList.toggle("disabled", page === totalPages);
    }

    document.getElementById("prevSupplier").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById("nextSupplier").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);
});



// Purchasing Table

document.addEventListener("DOMContentLoaded", function() {
    var rowsPerPage = 8;
    var rows = document.querySelectorAll("#trDataTablePurchasing tbody tr");
    var totalPages = Math.ceil(rows.length / rowsPerPage);
    var currentPage = 1;

    function showPage(page) {
        rows.forEach((row, index) => {
            row.style.display = (index >= (page - 1) * rowsPerPage && index < page * rowsPerPage) ? "" : "none";
        });
        updatePagination(page);
    }

    function updatePagination(page) {
        var paginationNumbers = document.querySelector(".trp-page-numbers.purchasing");
        paginationNumbers.innerHTML = "";

        for (var i = 1; i <= totalPages; i++) {
            var pageItem = document.createElement("li");
            pageItem.className = `page-item ${i === page ? "active" : ""}`;
            var pageLink = document.createElement("a");
            pageLink.className = "page-link";
            pageLink.href = "#";
            pageLink.textContent = i;
            pageLink.addEventListener("click", function(e) {
                e.preventDefault();
                currentPage = parseInt(this.textContent);
                showPage(currentPage);
            });
            pageItem.appendChild(pageLink);
            paginationNumbers.appendChild(pageItem);
        }

        document.getElementById("prevPurchasing").parentElement.classList.toggle("disabled", page === 1);
        document.getElementById("nextPurchasing").parentElement.classList.toggle("disabled", page === totalPages);
    }

    document.getElementById("prevPurchasing").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById("nextPurchasing").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);
});

// Dashboard - Best Selling Table

document.addEventListener("DOMContentLoaded", function() {
    var rowsPerPage = 8;
    var rows = document.querySelectorAll("#trDataTableBestSelling tbody tr");
    var totalPages = Math.ceil(rows.length / rowsPerPage);
    var currentPage = 1;

    function showPage(page) {
        rows.forEach((row, index) => {
            row.style.display = (index >= (page - 1) * rowsPerPage && index < page * rowsPerPage) ? "" : "none";
        });
        updatePagination(page);
    }

    function updatePagination(page) {
        var paginationNumbers = document.querySelector(".trp-page-numbers.trBestSelling");
        paginationNumbers.innerHTML = "";

        for (var i = 1; i <= totalPages; i++) {
            var pageItem = document.createElement("li");
            pageItem.className = `page-item ${i === page ? "active" : ""}`;
            var pageLink = document.createElement("a");
            pageLink.className = "page-link";
            pageLink.href = "#";
            pageLink.textContent = i;
            pageLink.addEventListener("click", function(e) {
                e.preventDefault();
                currentPage = parseInt(this.textContent);
                showPage(currentPage);
            });
            pageItem.appendChild(pageLink);
            paginationNumbers.appendChild(pageItem);
        }

        document.getElementById("trBestSelling_prev").parentElement.classList.toggle("disabled", page === 1);
        document.getElementById("trBestSelling_next").parentElement.classList.toggle("disabled", page === totalPages);
    }

    document.getElementById("trBestSelling_prev").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById("trBestSelling_next").addEventListener("click", function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);
});