using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using APIAngulaJSW3Schools.Models;

namespace APIAngulaJSW3Schools.Data
{
    public class Context : DbContext
    {

        public Context(DbContextOptions<Context> options) : base(options)
        {

        }
        public DbSet<Customer> Customers { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Customer>(
                entity =>
                {
                    entity.ToTable("Customers");
                    entity.Property(e => e.Id).HasColumnName("Id");
                    entity.Property(e => e.Name).HasColumnName("Name");
                    entity.Property(e => e.City).HasColumnName("City");
                    entity.Property(e => e.Country).HasColumnName("Country");


                });

        }
    }
}
