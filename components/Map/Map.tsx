import { MapPin } from "lucide-react";
import { company } from "@/data/company";

export default function MapSection() {
  return (
    <section className="bg-bg pb-20 lg:pb-28" aria-label="نقشه موقعیت شرکت">
      <div className="container-site">
        <div className="relative flex h-[320px] w-full items-center justify-center overflow-hidden rounded-sm border border-black/5 bg-white technical-grid">
          <div className="flex flex-col items-center gap-3 text-center px-6">
            <span className="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-accent">
              <MapPin size={22} aria-hidden="true" />
            </span>
            <p className="text-sm font-medium text-secondary max-w-sm">
              نقشه موقعیت {company.name} به‌زودی در این بخش نمایش داده
              می‌شود.
            </p>
            <p className="text-xs text-concrete">{company.address.headOffice}</p>
          </div>
        </div>
      </div>
    </section>
  );
}
